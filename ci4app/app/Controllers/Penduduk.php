<?php

namespace App\Controllers;

use App\Models\PendudukModel;

class Penduduk extends BaseController
{
    protected $pendudukModel;
    public function __construct()
    {
        $this->pendudukModel = new PendudukModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_penduduk') ? $this->request->getVar('page_penduduk') : 1;

        $keyword = $this->request->getVar('keyword');
        // $item = $this->itemModel->findAll();
        if ($keyword) {
            $penduduk = $this->pendudukModel->search($keyword);
        } else {
            $penduduk = $this->pendudukModel;
        }

        $data = [
            'tittle' => 'Daftar Penduduk | HardwareStore',
            //'penduduk' => $this->pendudukModel->findAll(),
            'penduduk' => $penduduk->paginate(5, 'penduduk'),
            'pager' => $this->pendudukModel->pager,
            'currenPage' => $currentPage

        ];

        return view('penduduk/index', $data);
    }


    //--------------------------------------------------------------------

}
