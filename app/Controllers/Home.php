<?php 
namespace App\Controllers;

class Home extends BaseController{
    public function index()
    {
        $menu =[
            'beranda' =>[
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => 'active',
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
                'aktif' => '',
            ],
            'nama dosen ' =>[
                'title' => 'nama dosen ',
                'link' => base_url() . '/nama dosen ',
                'icon' => 'fa-solid fa-user',
                'aktif' => '',
            ],
        ];

        $breadcrumb = '                        <div class="col-sm-6">
        <h1 class="m-0">Beranda</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Beranda</a></li>

        </ol>
    </div>';
        $data['menu'] = $menu;
        $data ['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "welcome to my website";
        $data ['selamat_datang'] = "selamat datang di kampus kami";
         return view('template/content', $data);
    }
}
?>