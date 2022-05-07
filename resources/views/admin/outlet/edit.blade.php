@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card">
            <div class="card-header">
                  <h5 class="card-title">Update Outlet</h5>
            </div>
            <div class="alert alert-success" id="success-alert" style="display:none; text-align:center;">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong style="text-align:center">Outlet Updated Successfully!</strong>
           </div>
            <div class="card-body">
                <form id="outlet_edit_form" action="{{ url('update_outlet/'.$outlet->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" value="{{ $outlet->name }}" name="name">
                            <span class="text-danger error-text name_error" ></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="address">Address</label>
                            <input id="address" type="text" class="form-control" value="{{ $outlet->address }}" name="address">
                            <span class="text-danger error-text address_error" ></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input id="phone_number" type="text" class="form-control" value="{{ $outlet->phone_number }}" name="phone_number">
                            <span class="text-danger error-text phone_number_error" ></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="manager_name">Manager Name</label>
                            <input id="manager_name" type="text" class="form-control" value="{{ $outlet->manager_name }}" name="manager_name">
                            <span class="text-danger error-text manager_name_error" ></span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $outlet->description }}</textarea>
                            <span class="text-danger error-text description_error" ></span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="location">Location</label>
                            <input id="location" type="text" class="form-control" value="{{ $outlet->location }}" name="location">
                            <span class="text-danger error-text location_error" ></span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="latitude">Latitude</label>
                            <input id="latitude" type="text" class="form-control" value="{{ $outlet->latitude }}" name="latitude">
                            <span class="text-danger error-text latitude_error" ></span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="longitude">Longitude</label>
                            <input id="longitude" type="text" class="form-control" value="{{ $outlet->longitude }}" name="longitude">
                            <span class="text-danger error-text longitude_error" ></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="o_time">Opening Time</label>
                            <input id="o_time" type="time" class="form-control" value="{{ $outlet->opening_time }}" name="opening_time">
                            <span class="text-danger error-text opening_time_error" ></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="c_time">Closing Time</label>
                            <input id="c_time" type="time" class="form-control" value="{{ $outlet->closing_time }}" name="closing_time">
                            <span class="text-danger error-text closing_time_error" ></span>
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

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      // Validation error message
        $(function(){
          $("#outlet_edit_form").on('submit', function(e){
            e.preventDefault();

            $.ajax({
              url:$(this).attr('action'),
              method:$(this).attr('method'),
              data:new FormData(this),
              processData:false,
              dataType:'json',
              contentType:false,
              beforeSend:function(){
                  $(document).find('span.error-text').text('');
              },
              success:function(data){
                  if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                      $('span.'+prefix+'_error').text(val[0]);
                    });
                  }else{
                    $('html, body').animate({ scrollTop: 0 }, 0);
                    $("#success-alert").fadeIn(800);
                    setTimeout(function(){
                       $("#success-alert").fadeOut();
                     }, 5000);
                     $(".close").click(function(){
                        $("#success-alert").fadeOut(800);
                    });
                  }
              }

            });
          });
        });
    </script>
@endsection
