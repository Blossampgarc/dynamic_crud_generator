@extends('layouts.app')
  @section('content')
<div class='content-body'>
   <div class='container-fluid'>
                <div class='row justify-content-center'>
                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='form-validation'>
       <form class='form-valide' action='{{route("emp_submit")}}' method='POST' enctype='multipart/form-data'>
        @csrf
            
               
             <div class='form-group row'>
                  <div class='col-lg-6'>
                      <label class='col-lg-4 col-form-label'>first_name<span class='text-danger'>*</span>
                                            </label>
                        <input id='first_name' class='form-control' name='first_name'  required autocomplete='text' placeholder='Enter your first_name' type='text'>
                  </div>

              </div> 
             <div class='form-group row'>
                  <div class='col-lg-6'>
                      <label class='col-lg-4 col-form-label'>last_name<span class='text-danger'>*</span>
                                            </label>
                        <input id='last_name' class='form-control' name='last_name'  required autocomplete='text' placeholder='Enter your last_name' type='text'>
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
                      <label class='col-lg-4 col-form-label'>mobile_number<span class='text-danger'>*</span>
                                            </label>
                        <input id='mobile_number' class='form-control' name='mobile_number'  required autocomplete='text' placeholder='Enter your mobile_number' type='text'>
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
 