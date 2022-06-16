@extends('layouts.mains')
@section('content')
<!-- start modal -->
<!-- Button trigger modal -->
<div class='content-body'>
<div class="container">
  @if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
 @if(session('stat'))
<div class="alert alert-danger">{{session('stat')}}</div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="mytable" name="mytable" class="table table-bordered table-striped">
                     <thead>
                       <th>ID</th>
                       <th>Name</th>
                       <th>Fields</th> 
                       <th>Status</th>
                        </thead>
                        <tbody id="tbody">
                           @foreach($data as $p)
                           <tr>
                            <td>{{$p->id}}</td>
                           <td>{{$p->name}}</td>
                           <td>{{$p->field_name}}</td>
                                <td>
                                   @if($p->status == '1')
                                <a href="{{route('stat',$p->id)}}" class="btn btn-success">Active</a> 
                               @else
                                <a href="{{route('stat',$p->id)}}" class="btn btn-danger">In-Active</a>
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
</div>
</div>                 
@endsection


