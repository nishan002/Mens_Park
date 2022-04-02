@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="card">
            <div class="card-header">
                  <div class="col-md-6 mb-3">
                        <h5 class="card-title">Category</h5>
                  </div>
                  <div class="col-md-6 mb-3">
                        <a href="{{ url('add_category')}}"><button class="btn btn-primary">Add Category</button></a>
                  </div>
            </div>   
            <div class="card-body">
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" type="get" action="{{ url('category_search') }}">
                        <input name="query" type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                  </form>
                <table class="table">
                      <thead>
                        <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($category as $item)
                        <tr>
                              <td>{{ $item->id }}</td>    
                              <td>{{ $item->name }}</td>    
                              <td> {{Str::limit($item->description, 50)}}</td>    
                              <td>
                                    <a href="{{ url('edit_category/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('delete_category/'.$item->id) }}" class="btn btn-danger">Delete</a>
                              </td>    
                        </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>   
      </div> 
@endsection