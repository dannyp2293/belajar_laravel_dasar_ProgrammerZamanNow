<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserControllerUrlGenerations extends Controller
{
      public function profile()
    {
        return 'Ini halaman profil user';
    }

    public function show($id)
    {
        return "Menampilkan data user dengan ID: {$id}";
    }

    public function edit($id)
    {
        return "Edit data user dengan ID: {$id}";
    }
}
