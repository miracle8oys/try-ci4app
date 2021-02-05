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

    //--------------------------------------------------------------------

}
