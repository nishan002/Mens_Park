@extends('welcome')

@section('content')
<div class="card">
            <div class="card-header">
                  <div class="col-md-12 mb-3">
                        <h5 class="card-title text-center">All Outlets</h5>
                  </div>
                  <div class="col-md-off-6 col-md-3 mb-3">
                        <ul class="nav nav-pills">
                              <li class="nav-item"> 
                              <a class="nav-link {{ Request::is('outlet_view') ? 'active' : '' }}" aria-current="page" href="{{ url('outlet_view') }}">Outlet List</a>
                              </li>
                              <li class="nav-item">
                              <a class="nav-link {{ Request::is('outlet_map') ? 'active' : '' }}" href="{{ url('outlet_map') }}">Outlet Map</a>
                              </li>
                         </ul>
                  </div>
            </div>   
            <div class="card-body">
                  <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" type="get" action="{{ url('search_outlets') }}">
                        <input name="query" type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                  </form>
                <table class="table">
                      <thead>
                        <tr>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Phone Number</th>
                              <th>Manager Name</th>
                              <th>Location</th>
                              <th>Description</th>
                              <th>Opening Time</th>
                              <th>Closing Time</th>
                              <th>image</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($outlets as $item)
                        <tr>  
                              <td>{{ $item->name }}</td>   
                              <td>{{ $item->address }}</td>   
                              <td>{{ $item->phone_number }}</td>   
                              <td>{{ $item->manager_name }}</td>   
                              <td>{{ $item->location }}</td>  
                              <td>{{Str::limit($item->description, 50)}}</td> 
                              <td>{{ $item->opening_time }}</td>   
                              <td>{{ $item->closing_time }}</td>  
                              <td>
                                    <img src="{{ asset('assets/uploads/outlets/'.$item->image) }}" class="cate-image" alt="Image here">
                              </td> 
                        </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>   
      </div> 
@endsection