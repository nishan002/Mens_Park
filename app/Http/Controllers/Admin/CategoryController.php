<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
class CategoryController extends Controller
{
    // Category index page in the Admin Panel
    public function index(){
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    // Add Category page in the Admin Panel
    public function add_category(){
        return view('admin.category.add');
    }

    // Storing the data of category in the database with validation
    public function store_category(Request $request){

          $validator = Validator::make($request->all(),[
            'name'=>'required|max:20|min:1',
            'slug'=>'required|unique:categories,slug|max:20|min:1',
            'description'=>'required|max:200|min:1',
          ]);

          if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
          }else{
            $category = new Category();
            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->description = $request->input('description');
            $category->status = $request->input('status') == True? '1' : '0';
            $category->save();
          
            return response()->json(['status'=>1, 'msg'=>'done']);

          }


    }

    // Edit page of the category in the admin panel
    public function edit($id){
        $category = Category::find($id);
        return view('admin/category/edit', compact('category'));
    }

    // Updating the data of the categories table
    public function update(Request $request, $id){

      $validator = Validator::make($request->all(),[
        'name'=>'required|max:20|min:1',
        'slug'=>'required|max:20|min:1',
        'description'=>'required|max:200|min:1',
      ]);

      if(!$validator->passes()){
        return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
      }else{
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True? '1' : '0';
        $category->update();
        return response()->json(['status'=>1, 'msg'=>'done']);

      }
    }

    // Delete category
    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Successfully');
    }

    // Search functionality for the category in the admin panel
    public function category_search(){
        $search_text = $_GET['query'];
        $category = Category::where('name', 'LIKE', '%'.$search_text.'%')->get();
        return view('admin/category/category_search', compact('category'));
    }
}
