<?php

namespace App\Models;
use CodeIgniter\Model;

class AlatModel extends Model
{
    protected $table = 'alat';
    protected $primaryKey = 'id_alat';
    protected $allowedFields = ['nama_alat', 'id_kategori', 'deskripsi', 'foto', 'is_hidden'];

    public function getAlatWithKategori($onlyVisible = false)
    {
        $builder = $this->select('alat.*, kategori.nama_kategori')
                    ->join('kategori', 'kategori.id_kategori = alat.id_kategori');
                    
        if ($onlyVisible) {
            $builder->where('alat.is_hidden', 0);
            $builder->where('kategori.is_hidden', 0);
        }
        
        return $builder->findAll();
    }
}