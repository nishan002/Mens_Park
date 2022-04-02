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
            <div class="mapouter"><div class="gmap_canvas"><iframe class="embed-responsive-item" width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=chattogram&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">insert google map into wordpress</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
            </div>   
      </div> 
@endsection