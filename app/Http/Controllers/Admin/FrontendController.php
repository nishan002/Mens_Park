<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outlet;

class FrontendController extends Controller
{   
    // Dashboard view
    public function index(){
        $outlets = Outlet::all();
        $count = Outlet::count();
        return view('admin.index',compact('outlets', 'count'));
    }
}
