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
                  <form class="forms-sample" method="POST" action="{{route('admin.password.update')}}">
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
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" placeholder="New Password" name="new_password">
                        @if($errors)
                        @error('new_password')
                            <small class="text-sm text-danger">{{$message}}</small>
                        @enderror
                        @endif
                      </div>
                    <div class="form-group">
                      <label for="password_confirmation">Confirm Password</label>
                      <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
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