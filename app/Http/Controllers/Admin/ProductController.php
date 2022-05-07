<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Validator;

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

      // Validation check for the Product add form
        $validator = Validator::make($request->all(),[
          'category_id'=>'required',
          'name'=>'required|max:50|min:1',
          'slug'=>'required|unique:products,slug|max:50|min:1',
          'price'=>'required|max:30|min:1',
          'description'=>'required|max:500|min:1',
          'image'=>'required|image|max:5120|mimes:jpg,png,jpeg',
        ]);

        if(!$validator->passes()){
          return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{
          $product = new Product();

          // Product imgae file update
          if($request->hasFile('image')){
              $file = $request->file('image');
              $extension = $file->getClientOriginalExtension();
              $file_name = time().'.'.$extension;
              $file->move('assets/uploads/products/',$file_name);
              $product->image = $file_name;
          }

          // Product data inserting
          $product->name = $request->input('name');
          $product->slug = $request->input('slug');
          $product->description = $request->input('description');
          $product->price = $request->input('price');
          $product->category_id = $request->input('category_id');

          $product->save();
          return response()->json(['status'=>1, 'msg'=>'done']);
        }

    }

    // Edit page of the product in the admin panel
    public function edit($id){
        $product = Product::find($id);
        $categories = Category::select('id', 'name')->get();
        return view('admin/product/edit', compact('product', 'categories'));
    }

    // Updating the data of the products table
    public function update(Request $request, $id){

        // Validation check for the Product update form
        $validator = Validator::make($request->all(),[
          'category_id'=>'required',
          'name'=>'required|max:50|min:1',
          'slug'=>'required|max:50|min:1',
          'price'=>'required|max:30|min:1',
          'description'=>'required|max:500|min:1',
          'image'=>'image|max:5120|mimes:jpg,png,jpeg',
        ]);

        if(!$validator->passes()){
          return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{
          $product = Product::find($id);

          // Product imgae file update
          if($request->hasFile('image')){
              $file = $request->file('image');
              $extension = $file->getClientOriginalExtension();
              $file_name = time().'.'.$extension;
              $file->move('assets/uploads/products/',$file_name);
              $product->image = $file_name;
          }

          // Data updating
          $product->name = $request->input('name');
          $product->slug = $request->input('slug');
          $product->description = $request->input('description');
          $product->price = $request->input('price');
          $product->category_id = $request->input('category_id');

          $product->update();
          return response()->json(['status'=>1, 'msg'=>'done']);
        }


    }

    // Delete product
    public function destroy($id){
        $product = Product::find($id);
        $directory = 'assets/uploads/products/'.$product->image;

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
