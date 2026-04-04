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

        // Retrieve 5 most recent transactions
        $recent_transaksi = $transaksiModel->select('transaksi.*, alat.nama_alat, penyewa.nama_penyewa')
                    ->join('alat', 'alat.id_alat = transaksi.id_alat')
                    ->join('penyewa', 'penyewa.id_penyewa = transaksi.id_penyewa')
                    ->orderBy('transaksi.id_transaksi', 'DESC')
                    ->limit(5)
                    ->findAll();

        $data = [
            'title' => 'Dashboard',
            'total_alat' => $alatModel->countAll(),
            'total_penyewa' => $penyewaModel->countAll(),
            'total_transaksi' => $transaksiModel->countAll(),
            'recent_transaksi' => $recent_transaksi
        ];

        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('dashboard/index', $data);
        echo view('layout/footer');
    }
}