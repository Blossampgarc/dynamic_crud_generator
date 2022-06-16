@extends('layouts.creating')
@section('content')
<form method="post" id="forming" action="{{route('form_submit')}}">
        @csrf
        <div class="container">
  <div class="form-group">
   @if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
    <br>
    <h2>Create  Dynamic Controller, Model, Request in seconds :)</h2>
    <label for="command">Artisan Command you want to Build:</label>
    <input type="text" class="form-control" name="command" id="command" required="" placeholder="Enter your command">
    {{--
    <!-- <input type="text" class="form-control" name="role_assign" id="role_assign" required="" placeholder="Enter what permissions are assigned"> -->
   <!--  <label>Permissions Allowed</label>
<label class="container">Create
  <input type="checkbox" checked="checked" value="create">
  <span class="checkmark"></span>
</label>
<label class="container">Update
  <input type="checkbox" value="update">
  <span class="checkmark"></span>
</label>
<label class="container">View
  <input type="checkbox" value="view">
  <span class="checkmark"></span>
</label>
<label class="container">Delete
  <input type="checkbox" value="delete">
  <span class="checkmark"></span>
</label> -->
--}}
  </div>
  <button type="submit" class="btn btn-primary" id="create">Create</button>
  <br>
  <h3 ><span class="note"> Create your dynamic table</span></h3>
 <table class="table table-bordered" id="dynamicTable">  
            <tr>
                <th>Field Name</th>
                <th>Data Size</th>
                <th>Data Type</th>
                <th>Action</th>
            </tr>
            <tr>  
                <td><input type="text" name="field_name[]" placeholder="Enter your Field Name" class="form-control" required=""/></td>  
                <td><input type="text" name="field_size[]" placeholder="Enter your Data size" class="form-control"/></td>
 
                <td> <select  style="background-color:Grey;" name="data_type[]" class="form-control " required="">
                        <option value="integer">Integer</option>
                        <option value="string">String</option>
                         <option value="text">Text</option>
                         <option value="mediumText">Image/Video</option>
                         <option value="date">Date</option>
                         
                    </select></td> 


                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
            </tr>  
        </table> 
  </div>
@endsection