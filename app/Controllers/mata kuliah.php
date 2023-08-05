<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MataKuliah extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' =>[
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => '',
            ],
            ' mahasiswa' =>[
                'title' => 'mahasiswa',
                'link' => base_url() . '/mahasiswa',
                'icon' => 'fa-solid fa-users',
                'aktif' => '',
            ],
            ' mata kuliah' =>[
                'title' => ' mata kuliah',
                'link' => base_url() . '/ mata kuliah',
                'icon' => 'fa-solid fa-list',
                'aktif' => 'active',
            ],
            'nama dosen ' =>[
                'title' => 'nama dosen ',
                'link' => base_url() . '/nama dosen ',
                'icon' => 'fa-solid fa-user',
                'aktif' => '',
            ],
        ];
    
        $breadcrumb = '                        <div class="col-sm-6">
        <h1 class="m-0">mata kuliah</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="'.base_url().'">Beranda</a></li>
            <li class="breadcrumb-item active">mata kuliah</a></li>
    
        </ol>
    </div>';
        $data['menu'] = $menu;
        $data ['breadcrumb'] = $breadcrumb;
        return view ('mata kuliah/content',$data);
    }
}
