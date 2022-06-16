@extends('layouts.app')
  @section('content')
<div class='content-body'>
   <div class='container-fluid'>
                <div class='row justify-content-center'>
                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='form-validation'>
       <form class='form-valide' action='{{route("kitchen_submit")}}' method='POST' enctype='multipart/form-data'>
        @csrf
            
               
             <div class='form-group row'>
                  <div class='col-lg-6'>
                      <label class='col-lg-4 col-form-label'>name<span class='text-danger'>*</span>
                                            </label>
                        <input id='name' class='form-control' name='name'  required autocomplete='text' placeholder='Enter your name' type='text'>
                  </div>

              </div><br>            
                                        <div class='form-group row'>
                                            <div class='col-lg-6 ml-auto'>
                                                <button type='submit' class='btn btn-primary'>Add your record</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
                                  
@endsection
 