<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $pm;


    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new MahasiswaModel();
        $this->menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => '',
            ],
            ' mahasiswa' =>[
                'title' => ' mahasiswa',
                'link' => base_url() . '/mahasiswa',
                'icon' => 'fa-solid fa-users',
                'aktif' => 'active',
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
        $this->rules = [
            ' NPM,' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' NPM, tidak boleh kosong',
                ]
            ],
            'Nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                ]
            ],
            'Alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong',
                ]
            ],

        ];
    }
    public function index()
    {

        $breadcrumb = '                        <div class="col-sm-6">
        <h1 class="m-0">nama mahasiswa</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="' . base_url() . '">Beranda</a></li>
            <li class="breadcrumb-item active"> NPM</a></li>
    
        </ol>
    </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data nama mahasiswas";

        $query = $this->pm->find();
        $data['data_pasien'] = $query;
        return view(' NPM/content', $data);
    }
    public function tambah()
    {
        $breadcrumb = '                        <div class="col-sm-6">
        <h1 class="m-0"> nama mahasiswa</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="' . base_url() . '">Beranda</a></li>
            <li class="breadcrumb-item"><a href="' . base_url() . '/ NPM"> NPM</a></li>
            <li class="breadcrumb-item active">Tambah  NPM</a></li>
    
        </ol>
    </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah  NPM';
        $data['action'] = base_url() . '/ NPM/simpan';
        return view(' NPM/input', $data);
    }
    public function simpan()
    {

        if (strtolower($this->request->getMethod()) !== 'post') {

            return redirect()->back()->withInput();
        }

        if (!$this->validate($this->rules)) {

            return redirect()->back()->withInput();
        }

        $dt = $this->request->getPost();
        try {
            $simpan = $this->pm->insert($dt);
            return redirect()->to(' NPM')->with('success', 'Data berhasil disimpan');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    public function hapus($id)
    {
        if (empty($id)) {
            return redirect()->back()->with('error', 'hapus data gagal dilakukan');
        }
        try {
            $this->pm->delete($id);
            return redirect()->to(' NPM')->with('success', 'Data  NPM dengan  NPM,' . $id . 'berhasil dihapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to(' NPM')->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $breadcrumb = '                        <div class="col-sm-6">
        <h1 class="m-0"> nama mahasiswa</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="' . base_url() . '">Beranda</a></li>
            <li class="breadcrumb-item"><a href="' . base_url() . '/ NPM"> NPM</a></li>
            <li class="breadcrumb-item active">Edit  NPM</a></li>
    
        </ol>
    </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit  NPM';
        $data['action'] = base_url() . '/ NPM/update';

        $data['edit_data'] = $this->pm->find($id);
        return view(' NPM/input', $data);
    }
    public function update()
    {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['Alamat']);

        if (!$this->validate($this->rules)) {

            return redirect()->back()->withInput();
        }
        if (empty($dtEdit['Alamat'])) {
            unset($dtEdit['Alamat']);
        }
        try {
            $this->pm->update($param, $dtEdit);
            return redirect()->to(' NPM')->with('success', 'Data berhasil di update');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
