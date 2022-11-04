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
                  <form class="forms-sample" method="POST" action="{{route('admin.password.check')}}">
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
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" placeholder="Current Password" name="current_password">
                            @if ($errors)
                                @error('current_password')
                                    <span class="text-xs text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Check password match</button>
                        <a class="btn btn-light" href="{{route('admin.dashboard')}}">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
@endsection