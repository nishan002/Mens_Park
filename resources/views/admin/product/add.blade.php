@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card">
            <div class="card-header">
                  <h5 class="card-title">Create Product</h5>
            </div>
            <div class="alert alert-success" id="success-alert" style="display:none; text-align:center;">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong style="text-align:center">Product Added Successfully!</strong>
           </div>
            <div class="card-body">
                <form id="product_add_form" action="{{ url('store_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name">
                            <span class="text-danger error-text name_error" ></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="slug">Slug</label>
                            <input id="slug" type="text" class="form-control" name="slug">
                            <span class="text-danger error-text slug_error" ></span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="desc">Description</label>
                            <textarea class="form-control" name="description" id="desc" cols="30" rows="10"></textarea>
                            <span class="text-danger error-text description_error" ></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price">Price</label>
                            <input id="price" type="number" class="form-control" name="price">
                            <span class="text-danger error-text price_error" ></span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="control-label font-14 m-b-5">Select Category</label>
                            <div>
                                <select class="custom-select font-14 m-b-5" data-style="btn-default btn-outline" name="category_id">
                                    <option  data-tokens="Category"></option>
                                    @foreach($categories as $category)
                                        <option class="form-control" value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text category_id_error" ></span>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <input type="file" name="image" class="form-control">
                            <span class="text-danger error-text image_error" ></span>
                        </div>


                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Add Product</button>
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
        $("#product_add_form").on('submit', function(e){
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
            },

          });
        });
      });
    </script>
@endsection
