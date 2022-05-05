<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outlet;
use Illuminate\Support\Facades\File;

class OutletController extends Controller
{
    // Outlet index page in the Admin panel
    public function index(){
        $outlets = Outlet::all();
        return view('admin.outlet.index', compact('outlets'));
    }

    // Add Outlet page in the Admin Panel
    public function add_outlet(){
        return view('admin.outlet.add');
    }

    // Storing the data of outlet in the database with validation
    public function store_outlet(Request $request){
        $outlet = new Outlet();

        $request->validate([
            'name'=>'required|max:100|min:1',
            'address'=>'required|max:100|min:1',
            'phone_number'=>'required|max:20|min:1',
            'manager_name'=>'required|max:50|min:1',
            'description'=>'required|max:500|min:1',
            'location'=>'required|max:100|min:1',
            'latitude'=>'required|max:100|min:1',
            'longitude'=>'required|max:100|min:1',
            'opening_time'=>'required',
            'closing_time'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg',
            'image' => 'max:5120',
    ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('assets/uploads/outlets/',$file_name);
            $outlet->image = $file_name;
        }

        $outlet->name = $request->input('name');
        $outlet->address = $request->input('address');
        $outlet->phone_number = $request->input('phone_number') ?: '';
        $outlet->manager_name = $request->input('manager_name') ?: '';
        $outlet->description = $request->input('description') ?: '';
        $outlet->location = $request->input('location') ?: '';
        $outlet->latitude = $request->input('latitude') ?: '';
        $outlet->longitude = $request->input('longitude') ?: '';
        $outlet->opening_time = $request->input('opening_time') ?: '';
        $outlet->closing_time = $request->input('closing_time') ?: '';

        $outlet->save();
        return redirect('outlets')->with('status', 'Outlet Added Successfully');
    }

    // Edit page of the outlet in the admin panel
    public function edit($id){
        $outlet = Outlet::find($id);
        return view('admin/outlet/edit', compact('outlet'));
    }

    // Updating the data of the outlets table
    public function update(Request $request, $id){
        $outlet = Outlet::find($id);

        $request->validate([
            'name'=>'required|max:100|min:1',
            'address'=>'required|max:100|min:1',
            'phone_number'=>'required|max:100|min:1',
            'manager_name'=>'required|max:100|min:1',
            'description'=>'required|max:500|min:1',
            'location'=>'required|max:100|min:1',
            'latitude'=>'required|max:100|min:1',
            'longitude'=>'required|max:100|min:1',
            'opening_time'=>'required',
            'closing_time'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg',
            'image' => 'max:5120',
    ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('assets/uploads/outlets/',$file_name);
            $outlet->image = $file_name;
        }

        $outlet->name = $request->input('name');
        $outlet->address = $request->input('address');
        $outlet->phone_number = $request->input('phone_number') ?: '';
        $outlet->manager_name = $request->input('manager_name') ?: '';
        $outlet->description = $request->input('description') ?: '';
        $outlet->location = $request->input('location') ?: '';
        $outlet->latitude = $request->input('latitude') ?: '';
        $outlet->longitude = $request->input('longitude') ?: '';
        $outlet->opening_time = $request->input('opening_time') ?: '';
        $outlet->closing_time = $request->input('closing_time') ?: '';

        $outlet->update();
        return redirect('outlets')->with('status', 'Outlet Updated Successfully');
    }

    // Delete outlet
    public function destroy($id){
        $outlet = Outlet::find($id);
        $directory = 'assets/uploads/outlets/'.$outlet->image;

        if(File::exists($directory)){
            File::delete($directory);
        }
        $outlet->delete();
        return redirect('outlets')->with('status', 'Outlet Deleted Successfully');
    }

    // Search functionality for the outlet in the admin panel
    public function outlet_search(){
        $search_text = $_GET['query'];
        $outlets = Outlet::where('name', 'LIKE', '%'.$search_text.'%')->get();
        return view('admin/outlet/outlet_search', compact('outlets'));
    }

}
