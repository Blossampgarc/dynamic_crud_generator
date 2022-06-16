@extends('layouts.app')
  @section('content')
<div class='content-body'>
   <div class='container-fluid'>
                <div class='row justify-content-center'>
                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='form-validation'>
       <form class='form-valide' action='{{route("employee_submit")}}' method='POST' enctype='multipart/form-data'>
        @csrf
            
               
             <div class='form-group row'>
                  <div class='col-lg-6'>
                      <label class='col-lg-4 col-form-label'>name<span class='text-danger'>*</span>
                                            </label>
                        <input id='name' class='form-control' name='name'  required autocomplete='text' placeholder='Enter your name' type='text'>
                  </div>

              </div> 
             <div class='form-group row'>
                  <div class='col-lg-6'>
                      <label class='col-lg-4 col-form-label'>age<span class='text-danger'>*</span>
                                            </label>
                        <input id='age' class='form-control' name='age'  required autocomplete='text' placeholder='Enter your age' type='text'>
                  </div>

              </div> 
             <div class='form-group row'>
                  <div class='col-lg-6'>
                      <label class='col-lg-4 col-form-label'>address<span class='text-danger'>*</span>
                                            </label>
                        <input id='address' class='form-control' name='address'  required autocomplete='text' placeholder='Enter your address' type='text'>
                  </div>

              </div> 
             <div class='form-group row'>
                  <div class='col-lg-6'>
                      <label class='col-lg-4 col-form-label'>department<span class='text-danger'>*</span>
                                            </label>
                        <input id='department' class='form-control' name='department'  required autocomplete='text' placeholder='Enter your department' type='text'>
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
 