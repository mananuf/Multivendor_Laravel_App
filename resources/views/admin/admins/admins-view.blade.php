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
                           @if ($admin->type == "super_admin")
                           <label class="badge badge-success">Active</label>
                           @endif
                           @if ($admin->type == "vendor" || $admin->type == "sub_admin")
                                @if ($admin->status == 1)
                                <a href="{{url('admin/change-status/'.$admin->id)}}">
                                    <span class="badge badge-success">Active</span>
                                </a>
                                @else
                                <a href="{{url('admin/change-status/'.$admin->id)}}">
                                    <span class="badge badge-secondary text-white">in-active</span>
                                </a>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if ($admin->type == "vendor")
                                <a href="{{url('admin/view-vendor-details/'.$admin->id)}}" title="view Document">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:20px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                      </svg>                                      
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
@endsection