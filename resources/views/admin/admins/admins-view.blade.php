@extends('admin.layouts.layout')
@section('content')
 
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <x-messages/>
            <h4 class="card-title">{{$title}}</h4>
            <p class="card-description">
                {{$description}}
            </p>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Admin ID</th>
                        <th>User</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{$admin->id}}</td>
                        <td class="py-1">
                            <img src="{{$admin->image ? asset('storage/admin/'.$admin->image): asset('img/default_user.png')}}" alt="image"/>
                        </td>
                        <td>{{$admin->name}}</td>
                        <td class="text-info">{{$admin->type}}</td>
                        <td> {{$admin->phone}}</td>
                        <td>{{$admin->email}}</td>
                        <td>
                           @if ($admin->status == 1)
                           <label class="badge badge-success">Active</label>
                           @else
                           <label class="badge badge-secondary text-white">in-active</label>
                           @endif
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                    
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
@endsection