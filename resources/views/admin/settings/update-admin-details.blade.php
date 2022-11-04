@extends('admin.layouts.layout')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <x-messages/>
                <div class="card-body">
                  <h4 class="card-title">Update Details</h4>
                  <p class="card-description">
                    {{Auth::guard('admin')->user()->name}}
                  </p>
                  <form class="forms-sample" method="POST" action="{{route('admin.details.update')}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input class="form-control" id="exampleInputUsername1" value="{{Auth::guard('admin')->user()->name}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{Auth::guard('admin')->user()->email}}" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{Auth::guard('admin')->user()->name}}" name="name">
                        @if($errors)
                        @error('name')
                            <small class="text-sm text-danger">{{$message}}</small>
                        @enderror
                        @endif
                      </div>
                    <div class="form-group">
                      <label for="phone_number">Phone Number</label>
                      <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" value="{{Auth::guard('admin')->user()->phone}}" name="phone_number">
                      @if($errors)
                        @error('password_confirmation')
                            <small class="text-sm text-danger">{{$message}}</small>
                        @enderror
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>

                    <a class="btn btn-light" href="{{route('admin.dashboard')}}">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
@endsection