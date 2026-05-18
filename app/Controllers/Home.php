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
        
        $kategoriList = $kategoriModel->where('is_hidden', 0)->findAll();
        $alatAll = $alatModel->getAlatWithKategori(true);
        
        $kategoriWithAlat = [];
        foreach($kategoriList as $k) {
            $items = array_filter($alatAll, function($a) use ($k) {
                return $a['id_kategori'] == $k['id_kategori'];
            });
            $k['items'] = $items;
            $kategoriWithAlat[] = $k;
        }
        
        $featuredAlat = array_filter($alatAll, function($a) {
            return strpos($a['tags'], 'featured') !== false;
        });

        $data = [
            'title' => 'Sistem Penyewaan Multimedia',
            'kategoriWithAlat' => $kategoriWithAlat,
            'featuredAlat' => empty($featuredAlat) ? array_slice($alatAll, 0, 6) : $featuredAlat
        ];
        
        return view('public/index', $data);
    }

    public function detail($id)
    {
        $alatModel = new AlatModel();
        $kategoriModel = new KategoriModel();
        
        $alat = $alatModel->select('alat.*, kategori.nama_kategori')
                          ->join('kategori', 'kategori.id_kategori = alat.id_kategori')
                          ->where('alat.id_alat', $id)
                          ->where('alat.is_hidden', 0)
                          ->first();
                          
        if (!$alat) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $kategoriList = $kategoriModel->where('is_hidden', 0)->findAll();
        $alatAll = $alatModel->getAlatWithKategori(true);
        
        $kategoriWithAlat = [];
        foreach($kategoriList as $k) {
            $items = array_filter($alatAll, function($a) use ($k) {
                return $a['id_kategori'] == $k['id_kategori'];
            });
            $k['items'] = $items;
            $kategoriWithAlat[] = $k;
        }

        $data = [
            'title' => $alat['nama_alat'] . ' - MS-Rent',
            'alat' => $alat,
            'kategoriWithAlat' => $kategoriWithAlat
        ];
        
        return view('public/detail', $data);
    }
}