@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card">
            <div class="card-header">
                  <h5 class="card-title">Create Product</h5>
            </div>   
            <div class="card-body">
                <form action="{{ url('store_product') }}" method="POST" enctype="multipart/form-data">
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
                            <input id="name" type="text" class="form-control" name="name">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="slug">Slug</label>
                            <input id="slug" type="text" class="form-control" name="slug">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="desc">Description</label>
                            <textarea class="form-control" name="description" id="desc" cols="30" rows="10"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price">Price</label>
                            <input id="price" type="number" class="form-control" name="price">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="control-label font-14 m-b-5">Select Category</label>
                            <div>
                                <select class="custom-select font-14 m-b-5" data-style="btn-default btn-outline" name="category_id">
                                    <option  data-tokens="Category">Select Category </option>
                                    @foreach($categories as $category)
                                        <option class="form-control" value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <input type="file" name="image" class="form-control">
                        </div>


                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>

                    </div>
                </form>
            </div>   
    </div>
         
@endsection

