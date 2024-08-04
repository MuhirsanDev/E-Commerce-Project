<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
    
    // Membuat fungsi update category
    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();
        toastr()->closeButton()->timeOut(1300)->success('Category Update Successfully');
        
        return redirect('/view_category');
        
    }

    // Menampilkan halaman add_product dan menampilkan data category kedalam select option "Add Product"
    public function add_product(){
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    // Membuat fungsi menambahkan product
    public function upload_product(Request $request){
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image  = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }

        $data->save();
        toastr()->closeButton()->timeOut(1300)->success('Product Added Successfully');
        return redirect()->back();
        
    }
    
    // Menampilkan halaman view product
    public function view_product(){
        $product = Product::paginate(5);
        return view('admin.view_product', compact('product'));
    }
    
    // Membuat fungsi menghapus data product di view product
    public function delete_product($id){
        $data = Product::find($id);
        $data->delete();
        return redirect()->back();
    }
    
    
    // Membuat fungsi update product
    public function edit($id){
    $product = Product::find($id);
    return view('admin.edit_product', compact('product'));
    }

    // Membuat fungsi update product after edit
    public function update(Request $request, $id){
    $product = Product::find($id);
    $product->title = $request->title;
    $product->description = $request->description;
    $product->category = $request->category;
    $product->price = $request->price;
    $product->quantity = $request->quantity;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
    
    $product->save();
    toastr()->closeButton()->timeOut(1300)->success('Product Edit Successfully');
    return redirect('/view_product');
    
    }

    // Fungsi menampilkan search form dari database
    public function search(Request $request) {
        $query = $request->input('query');
    
        if ($query) {
            $product = Product::where('title', 'LIKE', "%$query%")
                              ->orWhere('description', 'LIKE', "%$query%")
                              ->orWhere('category', 'LIKE', "%$query%") // Mencari berdasarkan kategori
                              ->orWhere('price', $query) // Mencari berdasarkan harga
                              ->orWhere('quantity', $query) // Mencari berdasarkan kuantitas
                              ->paginate(5);
        } else {
            $product = Product::paginate(5); // Menampilkan semua produk jika tidak ada query
        }

    return view('admin.view_product', compact('product')); }


    // Fungsi mereturn index dengan pagiantion 
    public function index()
    {
        $product = Product::paginate(5); // Menampilkan semua produk dengan paginasi
        return view('admin.view_product', compact('product'));
    }


}
