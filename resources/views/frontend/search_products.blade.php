@extends('welcome')

@section('content')
<div class="card">
            <div class="card-header">
                  <div class="col-md-12 mb-3">
                        <h5 class="card-title text-center">All Products</h5>
                  </div>
            </div>   
            <div class="card-body">
                  <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" type="get" action="{{ url('search_products') }}">
                        <input name="query" type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                  </form>
                <table class="table">
                      <thead>
                        <tr>
                              <th>Name</th>
                              <th>Category</th>
                              <th>Description</th>
                              <th>Image</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($products as $item)
                        <tr>  
                              <td>{{ $item->name }}</td>    
                              <td>{{ $item->category->name }}</td>    
                              <td>{{Str::limit($item->description, 50)}}</td>    
                              <td>
                                    <img src="{{ asset('assets/uploads/products/'.$item->image) }}" class="cate-image" alt="Image here">
                              </td>  
                        </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>   
      </div> 
@endsection