<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Controller route 'admin.index' => 'admin/dashboard'
    public function index(){
        return view('admin.index');
    }

    // Controller route 'home.index' => '/'
    public function home(){
        return view('home.index');
    }
}
