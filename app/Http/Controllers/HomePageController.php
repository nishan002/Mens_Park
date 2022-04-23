<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Outlet;

class HomePageController extends Controller
{
    // Landing page 
    public function index(){
        return view('welcome');
    }

    // Product show page 
    public function product_view(){
        $products = Product::all();
        return view('frontend/product_view', compact('products'));
    }

    // Outlet show page
    public function outlet_view(){
        $outlets = Outlet::all();
        return view('frontend/outlet_view', compact('outlets'));
    }

    public function outlet_map(){
        $location = Outlet::all();
        return view('frontend/outlet_map', compact('location'));
    }

    // About the Mens Park show page
    public function about_me(){
        return view('frontend/about_me');
    }

    // Contact Page
    public function contact(){
        return view('frontend/contact');
    }

    // Search functinality for Product
    public function search_products(){
        $search_text = $_GET['query'];
        $products = Product::where('name', 'LIKE', '%'.$search_text.'%')->get();
        return view('frontend/search_products', compact('products'));
    }

    // Search functinality for Outlets
    public function search_outlets(){
        $search_text = $_GET['query'];
        $outlets = Outlet::where('name', 'LIKE', '%'.$search_text.'%')->get();
        return view('frontend/search_outlets', compact('outlets'));
    }


}
