<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Prodi extends BaseController
{
    public function index()
    {
        return view('prodi/content');
    }
}
