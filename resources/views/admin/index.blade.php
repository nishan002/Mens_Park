@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Welcome to Dashboard</h1>
      </div>
      <div class="card">
            <div class="card-header">
                  <div class="col-md-6 mb-3">
                        <h5 class="card-title">Total Outlets: {{$count }}</h5>
                  </div>
                  
            </div> 
            <div class="card-body">  
              <div class="row">
                @foreach($outlets as $item)
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-header">
                     <h5>{{ $item->name }}</h5>
                    </div>
                    <div class="card-body">
                      <p><span>Manager Name:</span> {{ $item->manager_name }}</p>
                      <p><span class="">Phone:</span> {{ $item->phone_number }}</p>
                      <p><span>Address:</span> {{ $item->address }}</p>
                      
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
          </div> 
@endsection