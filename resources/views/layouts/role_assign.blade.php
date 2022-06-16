@extends('layouts.roles')
@section('content')
<?php
$attributes = App\Models\main::where("is_active", 1)->where("is_deleted", 0)->where("status", 1)->get();
$permiss = App\Models\permission::where("is_active", 1)->where("is_deleted", 0)->get();
?>
<div class='content-body'>
<div class="container-fluid site-width">
        <!-- START: Card Data-->
        <button type="button" class="btn btn-outline-success font-w-600 my-auto text-nowrap ml-auto add-event" data-bs-toggle="modal" data-bs-target="#examModal">
  Check and Give Roles
</button>
<div class="modal fade" id="examModal" tabindex="-1" aria-labelledby="examModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="examModalLabel">Check and Give Roles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form method='POST' action="" id='assign-role-form'>
                        <input type="hidden" name="_token" value="">   
                        <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Role</th>
                            <th scope="col">Create</th>
                            <th scope="col">View</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody id="body_modal">
                           @foreach($attributes as $p)
                          <tr>
                                <td id="{{$p->name}}" name="{{$p->name}}" data-id="{{$p->id}}" >{{$p->name}}</td>
                            @foreach($permiss as $per)
                                <td><label name="{{$per->permission_name}}" data-id="{{$per->id}}" id="{{$per->permission_name}}">
                                  <input type="checkbox">
                               </label></td>
                               @endforeach
                               @endforeach
                                </tr>     
                        </tbody>
                      </table>
                      </form>
      </div>
       <div class="modal-footer">
                    <button class="border-primary">Update</button>
                      <button class="border-danger" data-bs-dismiss="modal">Cancel</button>
           </div>
          </div>
        </div>
      </div>        
            @if($attributes)
                <h3>Roles</h3>
                <div class="row">
                @foreach($attributes as $att)
                    @if($att->attribute == "roles")
                        <div class="col-12 col-md-6 col-lg-3 mt-3 role-assign-modal" data-role_id="{{$att->id}}" data-rolename='{{$att->role}}' style="cursor: pointer;">
                            <div class="card border-bottom-0">
                                <div class="card-content border-bottom border-primary border-w-5" style="border-color: {{$att->color}} !important;">
                                    <div class="card-body p-4">
                                        <div class="d-flex">
                                            <div class="circle-50 outline-badge-primary" style="color: {{$att->color}};border: 1px solid {{$att->color}};"><span class="cf card-liner-icon cf-xsn mt-2"></span></div>
                                            <div class="media-body align-self-center pl-3">
                                                <span class="mb-0 h6 font-w-600">{{$att->name}}</span><br />
                                                <p class="mb-0 font-w-500 h6">{{$att->role}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            @endif
    </div>
    </div>
@endsection












