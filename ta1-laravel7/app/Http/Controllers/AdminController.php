<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('tampil.index');
    }
//         public function index(){
//             return view('layouts.admin');
//         }
}
