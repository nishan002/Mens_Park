@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="card">
            <div class="card-header">
                  <div class="col-md-6 mb-3">
                        <h5 class="card-title">Product</h5>
                  </div>
                  <div class="col-md-6 mb-3">
                        <a href="{{ url('add_product')}}"><button class="btn btn-primary">Add Product</button></a>
                  </div>
            </div>   
            <div class="card-body">
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" type="get" action="{{ url('product_search') }}">
                        <input name="query" type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                  </form>
                <table class="table">
                      <thead>
                        <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Category</th>
                              <th>Description</th>
                              <th>Image</th>
                              <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($products as $item)
                        <tr>
                              <td>{{ $item->id }}</td>    
                              <td>{{ $item->name }}</td>    
                              <td>{{ $item->category->name }}</td>    
                              <td>{{Str::limit($item->description, 50)}}</td>    
                              <td>
                                    <img src="{{ asset('assets/uploads/products/'.$item->image) }}" class="cate-image" alt="Image here">
                              </td>
                              <td>
                                    <a href="{{ url('edit_product/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('delete_product/'.$item->id) }}" class="btn btn-danger">Delete</a>
                              </td>    
                        </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>   
      </div> 
@endsection