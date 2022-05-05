<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

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

        $request->validate([
            'name'=>'required|max:20|min:1',
            'slug'=>'required|unique:categories,slug|max:20|min:1',
            'description'=>'required|max:200|min:1',
    ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True? '1' : '0';
        $category->save();
        return redirect('categories')->with('status', 'Category Added Successfully');
    }

    // Edit page of the category in the admin panel
    public function edit($id){
        $category = Category::find($id);
        return view('admin/category/edit', compact('category'));
    }

    // Updating the data of the categories table
    public function update(Request $request, $id){

        $request->validate([
            'name'=>'required|max:20|min:1',
            'slug'=>'required|unique:categories,slug|max:20|min:1',
            'description'=>'required|max:200|min:1',
    ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True? '1' : '0';
        $category->update();
        return redirect('categories')->with('status', 'Category Updated Successfully');
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
