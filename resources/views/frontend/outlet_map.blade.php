@extends('welcome')

@section('content')
<div class="card">
            <div class="card-header">
                  <div class="col-md-12 mb-3">
                        <h5 class="card-title text-center">Outlets Location</h5>
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
                  <div id="map"></div>
      </div>
            
      </div> 
@endsection

@section('script')

<!-- Google map API key and Map ID -->


<script type="text/javascript">
     
      function initMap() {
            
            const myLatLng = { lat: 22.447054504516245, lng: 91.78526147055364 };
            const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: myLatLng,
            mapId: "2b85e1fd7d101f0",
            });

            
            new google.maps.Marker({
                  @foreach($location as $item)
                        position: { lat: {{ $item->latitude }}, lng: {{ $item->longitude }} },
                        map,
                        title: "{{ $item->name }}",
                  @endforeach   
            });     
                  
      }
      
      window.initMap = initMap;
      
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQMvgrlHWvzFihF5pXTRZIahjDXFhvIes&map_ids=2b85e1fd7d101f0&callback=initMap"></script>
@endsection