<?php

namespace App\Controllers;

use App\Models\ItemModel;

class Item extends BaseController
{
    protected $itemModel;
    public function __construct()
    {
        $this->itemModel = new ItemModel();
    }

    public function index()
    {
        // $item = $this->itemModel->findAll();

        $data = [
            'tittle' => 'Daftar Item | HardwareStore',
            'item' => $this->itemModel->getItem()
        ];

        return view('item/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'tittle' => 'Detail Item',
            'item' => $this->itemModel->getItem($slug)
        ];
        //eror handling jika item tidak ada
        if (empty($data['item'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Item' . $slug . ' tidak ditemukan.');
        }
        return view('item/detail', $data);
    }
    public function create()
    {

        $data = [
            'tittle' => 'Create Item',
            'validation' => \Config\Services::validation()

        ];
        return view('item/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'foto' => [
                'rules' => 'max_size[foto, 2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [

                    'max_size' => 'Ukuran file terlalu besar',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'Sistem hanya menerima file denganekstensi .jpg, .jpeg dan .png'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/item/create')->withInput()->with('validation', $validation);
            return redirect()->to('/item/create')->withInput();
        }

        $fileFoto = $this->request->getFile('foto');
        // cek file
        if ($fileFoto->getError() == 4) {
            $namaFile = 'default.jpg';
        } else {

            //move file
            $fileFoto->move('img');
            //get name file
            $namaFile = $fileFoto->getName();
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->itemModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $namaFile
        ]);

        session()->setFlashdata('pesan', 'Item Berhasil Ditambahkan.');

        return redirect()->to('/item');
    }

    public function delete($id)
    {
        $item = $this->itemModel->find($id);
        if ($item['foto'] != 'default.jpg') {

            unlink('img/' . $item['foto']);
        }


        $this->itemModel->delete($id);
        session()->setFlashdata('pesan', 'Item Berhasil Dihapus.');
        return redirect()->to('/item');
    }

    public function edit($slug)
    {
        $data = [
            'tittle' => 'Edit Item',
            'validation' => \Config\Services::validation(),
            'item' => $this->itemModel->getItem($slug)

        ];
        return view('item/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'foto' => [
                'rules' => 'max_size[foto, 2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [

                    'max_size' => 'Ukuran file terlalu besar',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'Sistem hanya menerima file denganekstensi .jpg, .jpeg dan .png'
                ]
            ]
        ])) {

            return redirect()->to('/item/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getName();
            $fileFoto->move('img', $namaFoto);
            unlink('img/' . $this->request->getVar('fotoLama'));
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->itemModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Item Berhasil Diubah.');

        return redirect()->to('/item');
    }
    //--------------------------------------------------------------------

}
