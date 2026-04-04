<?php

namespace App\Controllers;
use App\Models\AlatModel;
use App\Models\PenyewaModel;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $alatModel = new AlatModel();
        $penyewaModel = new PenyewaModel();
        $transaksiModel = new TransaksiModel();

        $data = [
            'title' => 'Dashboard',
            'total_alat' => $alatModel->countAll(),
            'total_penyewa' => $penyewaModel->countAll(),
            'total_transaksi' => $transaksiModel->countAll()
        ];

        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('dashboard/index', $data);
        echo view('layout/footer');
    }
}