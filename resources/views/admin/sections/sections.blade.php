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
                <table id="order-listing" class="table table-hover table-striped">
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
                        @if (Auth::guard('admin')->user()->type == "super_admin")
                        <td>
                           @if ($section->status == 1)
                           <a href="" data-toggle="modal" data-target="#deactivateModal-{{$section->id}}">
                            <span class="badge badge-success p-1">Active</span>
                           </a>

                            <!-- deActivate Status Modal -->
                            <div class="modal fade" id="deactivateModal-{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="deactivateModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="deactivateModalLabel">De-activate <b>{{$section->section_name}}</b>?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Are you sure you want to de-activate <b>{{$section->section_name}}</b>?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    {{-- <form  method="POST"> --}}
                                        <a href="{{url('admin/change-section-status/'.$section->id)}}" class="btn btn-primary">Deactivate</a>
                                    {{-- </form> --}}
                                    </div>
                                </div>
                                </div>
                            </div>
                           @else
                                <a href="" data-toggle="modal" data-target="#activateModal-{{$section->id}}">
                                    <span class="badge badge-secondary text-white p-1">in-active</span>
                                </a>

                                <!-- Activate Status Modal -->
                            <div class="modal fade" id="activateModal-{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="activateModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="activateModalLabel">Activate <b>{{$section->section_name}}</b> ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Are you sure you want to activate <b>{{$section->section_name}}</b>?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    {{-- <form  method="POST"> --}}
                                        <a href="{{url('admin/change-section-status/'.$section->id)}}" class="btn btn-primary">Activate</a>
                                    {{-- </form> --}}
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endif
                        </td>
                        <td>
                            
                                <a href="" title="{{'edit '.$section->section_name}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="" fill="currentColor" style="width:20px">
                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                      </svg>                                  
                                </a>

                                <a href="" data-toggle="modal" data-target="#deleteModal-{{$section->id}}" title="{{'delete '.$section->section_name}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mx-2 text-danger" fill="currentColor" style="width:20px">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                      </svg>
                                </a>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal-{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete {{$section->section_name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want to delete <b>{{$section->section_name}}</b>?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        {{-- <form  method="POST"> --}}
                                            <a href="{{url('admin/delete-section/'. $section->id)}}" class="btn btn-danger">Delete</a>
                                        {{-- </form> --}}
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
@endsection
