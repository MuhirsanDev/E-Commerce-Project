<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman admin category
    public function view_category()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    // Menghadle category yang dibuat oleh admin dan disimpan ke database
    public function add_category(Request $request){
        $category = new Category;
        $category -> category_name = $request -> category;
        $category -> save();
        // Menambahkan flash message ketika category yang dibuat berhasil
        toastr()->closeButton()->timeOut(1300)->success('Category Added Successfully');
        return redirect() -> back();
    }
    
    
    // Membuat Fungsi delete data category
    public function delete_category($id){
        $category = Category::find($id);
        $category -> delete();
        toastr()->closeButton()->timeOut(1300)->success('Category Delete Successfully');
        return redirect()->back();
    }

    // Membuat fungsi Edit category
    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.edit_category', compact('category'));
    }
    
    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();
        toastr()->closeButton()->timeOut(1300)->success('Category Update Successfully');
        
        return redirect('/view_category');
    }
}
