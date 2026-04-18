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
}