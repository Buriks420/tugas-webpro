<?php

namespace App\Controllers;
use App\Models\AlatModel;
use App\Models\KategoriModel;

class Home extends BaseController
{
    public function index()
    {
        $alatModel = new AlatModel();
        $kategoriModel = new KategoriModel();
        
        $data = [
            'title' => 'Sistem Penyewaan Multimedia',
            'alat' => $alatModel->getAlatWithKategori(true), // pass true for $onlyVisible
            'kategori' => $kategoriModel->where('is_hidden', 0)->findAll()
        ];
        
        return view('public/index', $data);
    }
}