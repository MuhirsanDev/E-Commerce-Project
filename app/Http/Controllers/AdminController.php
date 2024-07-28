<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman admin category
    public function view_category()
    {
        return view('admin.category');
    }

    // Menghadle category yang dibuat oleh admin dan disimpan ke database
    public function add_category(Request $request){
        $category = new Category;
        $category -> category_name = $request -> category;
        $category -> save();
        return redirect() -> back();
    }
}
