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
                        <th>Section ID</th>
                        <th>Section Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sections as $section)
                    <tr>
                        <td>{{$section->id}}</td>
                        <td>{{$section->section_name}}</td>
                        <td>
                           @if ($section->status == 1)
                           <a href="{{url('admin/change-section-status/'.$section->id)}}">
                            <span class="badge badge-success">Active</span>
                           </a>
                           @else
                                <a href="{{url('admin/change-section-status/'.$section->id)}}">
                                    <span class="badge badge-secondary text-white">in-active</span>
                                </a>
                            @endif
                        </td>
                        <td>
                            @if (Auth::guard('admin')->user()->type == "super_admin")
                                <a href="" title="{{'edit '.$section->section_name}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width:20px">
                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                      </svg>
                                                                       
                                </a>
                                <a href="" title="{{'delete '.$section->section_name}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width:20px">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
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