@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="card">
            <div class="card-header">
                  <div class="col-md-6 mb-3">
                        <h5 class="card-title">Outlets</h5>
                  </div>
                  <div class="col-md-6 mb-3">
                        <a href="{{ url('add_outlet')}}"><button class="btn btn-primary">Add Outlet</button></a>
                  </div>
            </div>   
            <div class="card-body">
                  <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" type="get" action="{{ url('outlet_search') }}">
                        <input name="query" type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                  </form>
                <table class="table">
                      <thead>
                        <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Phone Number</th>
                              <th>Manager Name</th>
                              <th>Location</th>
                              <th>Description</th>
                              <th>Latitude</th>
                              <th>Longitude</th>
                              <th>Opening Time</th>
                              <th>Closing Time</th>
                              <th>image</th>
                              <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($outlets as $item)
                        <tr>
                              <td>{{ $item->id }}</td>    
                              <td>{{ $item->name }}</td>   
                              <td>{{ $item->address }}</td>   
                              <td>{{ $item->phone_number }}</td>   
                              <td>{{ $item->manager_name }}</td>   
                              <td>{{ $item->location }}</td>  
                              <td>{{Str::limit($item->description, 50)}}</td>    
                              <td>{{ $item->latitude }}</td>  
                              <td>{{ $item->longitude }}</td>  
                              <td>{{ $item->opening_time }}</td>   
                              <td>{{ $item->closing_time }}</td>  
                              <td>
                                    <img src="{{ asset('assets/uploads/outlets/'.$item->image) }}" class="cate-image" alt="Image here">
                              </td>
                              <td>
                                    <a href="{{ url('edit_outlet/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('delete_outlet/'.$item->id) }}" class="btn btn-danger">Delete</a>
                              </td>    
                        </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>   
      </div> 
@endsection