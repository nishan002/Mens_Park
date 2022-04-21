@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card">
            <div class="card-header">
                  <h5 class="card-title">Update Outlet</h5>
            </div>   
            <div class="card-body">
                <form action="{{ url('update_outlet/'.$outlet->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                    @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" value="{{ $outlet->name }}" name="name">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="address">Address</label>
                            <input id="address" type="text" class="form-control" value="{{ $outlet->address }}" name="address">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input id="phone_number" type="text" class="form-control" value="{{ $outlet->phone_number }}" name="phone_number">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="manager_name">Manager Name</label>
                            <input id="manager_name" type="text" class="form-control" value="{{ $outlet->manager_name }}" name="manager_name">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $outlet->description }}</textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="location">Location</label>
                            <input id="location" type="text" class="form-control" value="{{ $outlet->location }}" name="location">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="latitude">Latitude</label>
                            <input id="latitude" type="text" class="form-control" value="{{ $outlet->latitude }}" name="latitude">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="longitude">Longitude</label>
                            <input id="longitude" type="text" class="form-control" value="{{ $outlet->longitude }}" name="longitude">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="o_time">Opening Time</label>
                            <input id="o_time" type="time" class="form-control" value="{{ $outlet->opening_time }}" name="opening_time">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="c_time">Closing Time</label>
                            <input id="c_time" type="time" class="form-control" value="{{ $outlet->closing_time }}" name="closing_time">
                        </div>

                        <div class="col-md-12 mb-3">
                            <input type="file" name="image" class="form-control">
                        </div>


                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Update Outlet</button>
                        </div>

                    </div>
                </form>
            </div>   
    </div>
         
@endsection