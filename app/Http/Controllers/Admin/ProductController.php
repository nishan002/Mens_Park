<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Product index page in the Admin Panel
    public function index(){
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    // Add Product page in the Admin Panel
    public function add_product(){
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.add', compact('categories'));
    }

    // Storing the data of product in the database with validation
    public function store_product(Request $request){
        $product = new Product();

        $request->validate([
            'category_id'=>'required|max:20|min:1',
            'name'=>'required|max:50|min:1',
            'slug'=>'required|max:50|min:1',
            'price'=>'required|max:30|min:1',
            'description'=>'required|max:500|min:1'
    ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('assets/uploads/products/',$file_name);
            $product->image = $file_name;
        }
        
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        
        $product->save();
        return redirect('products')->with('status', 'Product Added Successfully');
    }

    // Edit page of the product in the admin panel
    public function edit($id){
        $product = Product::find($id);
        $categories = Category::select('id', 'name')->get();
        return view('admin/product/edit', compact('product', 'categories'));
    }

    // Updating the data of the products table 
    public function update(Request $request, $id){
        $product = Product::find($id);
        
        $request->validate([
            'category_id'=>'required|max:20|min:1',
            'name'=>'required|max:50|min:1',
            'slug'=>'required|max:50|min:1',
            'price'=>'required|max:30|min:1',
            'description'=>'required|max:500|min:1',
            'image'=>'required|image|mimes:jpg,png,jpeg'
    ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('assets/uploads/products/',$file_name);
            $product->image = $file_name;
        }
        
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        
        $product->update();
        return redirect('products')->with('status', 'Product Updated Successfully');
    }

    // Delete product
    public function destroy($id){
        $product = Product::find($id);
        $directory = 'assets/uploads/outlets/'.$product->image;

        if(File::exists($directory)){
            File::delete($directory);
        }
        $product->delete();
        return redirect('products')->with('status', 'Product Deleted Successfully');
    }

    // Search functionality for the product in the admin panel
    public function product_search(){
        $search_text = $_GET['query'];
        $products = Product::where('name', 'LIKE', '%'.$search_text.'%')->get();
        return view('admin/product/product_search', compact('products'));
    }
}
