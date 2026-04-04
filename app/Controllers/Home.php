<?php

namespace App\Controllers;
use App\Models\AlatModel;

class Home extends BaseController
{
    public function index()
    {
        $alatModel = new AlatModel();
        $data = [
            'title' => 'Katalog Alat Multimedia',
            'alat' => $alatModel->getAlatWithKategori()
        ];
        
        return view('public/index', $data);
    }
}