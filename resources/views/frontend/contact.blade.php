@extends('welcome')

@section('content')
<div class="card">
            <div class="card-header">
                  <div class="col-md-12 mb-3">
                        <h5 class="card-title text-center">Contact Us</h5>
                  </div>
            </div>   
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="name" placeholder="First Name">
                        
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Last Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Message</label>
                        <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>   
      </div> 
@endsection