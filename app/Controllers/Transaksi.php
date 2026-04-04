<?php

namespace App\Controllers;
use App\Models\TransaksiModel;
use App\Models\AlatModel;
use App\Models\PenyewaModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $alatModel;
    protected $penyewaModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->alatModel = new AlatModel();
        $this->penyewaModel = new PenyewaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Riwayat Penyewaan',
            'transaksi' => $this->transaksiModel->getTransaksiLengkap()
        ];

        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('transaksi/index', $data);
        echo view('layout/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Proses Penyewaan',
            'alat' => $this->alatModel->findAll(),
            'penyewa' => $this->penyewaModel->findAll()
        ];

        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('transaksi/create', $data);
        echo view('layout/footer');
    }

    public function store()
    {
        $this->transaksiModel->save([
            'id_alat' => $this->request->getVar('id_alat'),
            'id_penyewa' => $this->request->getVar('id_penyewa'),
            'tanggal_sewa' => $this->request->getVar('tanggal_sewa'),
            'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
            'status' => 'disewa'
        ]);
        
        return redirect()->to('/transaksi');
    }

    public function kembalikan($id)
    {
        $this->transaksiModel->update($id, ['status' => 'dikembalikan']);
        return redirect()->to('/transaksi');
    }
}