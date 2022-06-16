@extends('layouts.dynamic')
@section('content')
 <?php
 $no = '1';
?>
<!-- start modal -->
<!-- Button trigger modal -->
<div class='content-body'>
<div class="container">
   @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  @if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
 @if(session('stat'))
<div class="alert alert-danger">{{session('stat')}}</div>
@endif
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" onclick="myform.reset()" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add a new record
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form id="myform" name="myform" action="{{route('submit',$slug)}}" method="POST" enctype="multipart/form-data">
        @csrf
          <input type="hidden" name="record_id" id="record_id">
          @foreach($unser as $key =>$un)
        @if($un == 'image')
          <div class="mb-3" id="here">
        <label  class="form-label">{{$un}}</label>
        <input type="file" class="form-control" name="{{$un}}" data-key="{{ $un }}" id="{{$un}}">

       <!--  @if('image'!= '')
        <img src="{{$un}}" width="130" height="85" id="image">
        @endif -->
        
      </div>
      
        @elseif($un == 'video')
          <div class="mb-3" id="here">
        <label  class="form-label">{{$un}}</label>
        <input type="file" class="form-control" name="{{$un}}" data-key="{{ $un }}" id="{{$un}}">
      </div>
      @elseif($un == 'dob' )
          <div class="mb-3" id="here">
        <label  class="form-label">{{$un}}</label>
        <input type="date" class="form-control" name="{{$un}}" data-key="{{ $un }}" id="{{$un}}">
       
      </div>
      
       @elseif($un == 'editor')
          <div class="form-group">
          <label  class="form-label">CK EDITOR</label>
<textarea name="editor" id="{{$un}}"></textarea>
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script> 
        <script>
            CKEDITOR.replace( 'editor' );
        </script>
      </div>
     
      @else
   <div class="mb-3" id="here">
    <label  class="form-label">{{$un}}</label>
    <input type="text" class="form-control" name="{{$un}}" id="{{$un}}" required="">
  </div>
 @endif
  @endforeach
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Save Record</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
                <table id="mytable" name="mytable" class="table table-bordered table-striped">
                  <thead>
                    <th >S.No</th>
                    <th >ID</th>
                    @foreach($unser as $un)
                      <th >{{$un}}</th>
                    @endforeach
                      <th>Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
                   </thead>
                        <tbody id="tbody">
                           @foreach($data as $key => $p)
                           <tr>
                            <td>{{$no++}}</td>
                            <td>{{$p->id}}</td>
                               @foreach($unser as $un)
                               @if($p->$un == 'image')
                               @endif
                                <td data-target="{{$un}}">
                                  @if($un == 'image')
                                    <img src="{{asset(''.$p->image)}}" width="130" height="85" style="user-select: auto;">
                                   @elseif($un == 'video')
                                    <video width="130" height="85"controls><source src="{{asset(''.$p->video)}}" type="video/mp4"></video>
                                      
                                  @else
                                    {{$p->$un}}
                                  @endif  
                                  </td>
                                @endforeach
                                <td>
                              @if($p->status == '1')
                                <a href="{{url('/changeStatus',[$slug, $p->id])}}" class="btn btn-success">Active</a> 
                              @else
                              <a href="{{url('/changeStatus',[$slug, $p->id])}}" class="btn btn-danger">In-Active</a>
                              @endif
                                </td>
                                 <td>
                                  <a  data-id = "{{$p->id}}" data-slug="{{$slug}}" data-image="{{$p->image}}" data-video="{{$p->video}}"  data-bs-toggle="modal"  href="{{route('edit',[$slug, $p->id])}}" data-bs-target="#exampleModal" class="btn btn-primary edit" id="edit">Edit</a></td>
                                 <td>
                                    <input type="hidden" name="dd" value="{{$p->id}}">
                                    <a href="{{route('delete',[$slug, $p->id])}}" class="btn btn-danger delete" data-id="{{$p->id}}" data-slug="{{$slug}}" href="Javascript(0)" id="deleted_id">Delete</a>
                               </td>
                             </tr>
                               @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>                 
@endsection


