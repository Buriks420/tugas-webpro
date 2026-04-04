<?php

namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_alat', 'id_penyewa', 'tanggal_sewa', 'tanggal_kembali', 'status'];

    public function getTransaksiLengkap()
    {
        return $this->select('transaksi.*, alat.nama_alat, penyewa.nama_penyewa')
                    ->join('alat', 'alat.id_alat = transaksi.id_alat')
                    ->join('penyewa', 'penyewa.id_penyewa = transaksi.id_penyewa')
                    ->findAll();
    }
}