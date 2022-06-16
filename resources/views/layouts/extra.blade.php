//making views for crud generator

1//$add = fopen("../resources/views/crud" . "/" . $request->command . "-add.blade.php", "w");
2//  $edit = fopen("../resources/views/crud" . "/" . $request->command . "-edit.blade.php", "w");
3//  $display = fopen("../resources/views/crud" . "/" . $request->command . "-display.blade.php", "w");
4//   $rbt = "{{route('" . $request->command . "_submit')}}";

pro is field name

 //data $fname = $_POST['field_name'];
 //final       $arring = [];
  k and data      foreach ($fname as $key => $ind) {
ft            $first[] = "
             <div class='form-group row'>
<div class="col-lg-6">
                      <label class='col-lg-4 col-form-label'>". $ind . "<span class='text-danger'>*</span>
                                            </label>
                        <input id="$fname" class="form-control" name='" . $ind . "'  required autocomplete='text' placeholder='Enter your " . $ind . "' type='text'>
                      </div>
                                        </div>";
          
        }
//string1         $imp = implode(" ", $first) . "<br>";
  txt      $layt = "@extends('layouts.app')
  @section('content')
<div class='content-body'>
   <div class='container-fluid'>
                <div class='row justify-content-center'>
                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='form-validation'>
       <form class='form-valide' action='" . $rbt . "' method='POST' enctype='multipart/form-data'>
        @csrf
            
               " . $imp . "
                                           
   
                                                  
                                        <div class='form-group row'>
                                            <div class='col-lg-8 ml-auto'>
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
 ";
 fwrite($add, $layt);
        fclose($add);

///////////////////////////////////////////////////////////////////////////////////////////

//display page

        $fname = $_POST['field_name'];
        $arrying = [];
        foreach ($fname as $key => $ind) {
           $head[] = "<th>" . $ind . "</th>

                      ";
        $bdy[] = "
                 <th>{{" . $dollar . "name->" . $ind . "}}</th>

                  ";
            $editit = "{{route(" . $request->command . "_edit," . $dollar . "name->id)}}";
            $deleteit = "{{route(" . $request->command . "_delete," . $dollar . "name->id)}}";
          
            
        }
        $th = implode(" ", $head);
        $fth = implode(" ", $bdy);
        $text4 = " 
         <div class='content-body'>
            <div class='card shadow mb-4'>
                        <div class='card-header py-3'>
                            <h6 class='m-0 font-weight-bold text-primary'>" . $request->command . " Table</h6>
                        </div>
                        <div class='card-body'>
                            <div class='table-responsive'>
                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>


                                        <thead>
                                             <tr>
                                " . $th . " 
                                          <th>Edit</th>
                                          <th>Delete</th> 
                                </tr>
                                @foreach(" . $dollar . "fname as " . $dollar . "name)  
                                 <tr>
                                 " . $fth . "
                                <td><a href='" . $editit . "'>" . $request->command . "_edit</a></td>
                           <td><a href='" . $deleteit . "'>" . $request->command . "_delete</a></td>     
                                            
                                        </tr>
                                        @endforeach
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
         
    
    @endsection ";


//////////////////////////////////////////////////////////////////////////////////////////////////






















        @extends('layouts.create')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Enter your data</h4>
                  
                    <form class='form-valide' action="' . $rbt . '" method='POST' enctype='multipart/form-data'>
                       @csrf
            
               " . $imp . "
                                                    
                                        <div class='form-group row'>
                                            <div class='col-lg-8 ml-auto'>
                                                <button type='submit' class='btn btn-primary'>Add your record</button>
                                            </div>
                                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
    
        <!-- partial -->
      </div>
@endsection












////////////////////////////////////////////////////////////////////////////////////////////////


//modal goes here

  <div class="modal demo-modal">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modal title</h5>
                          <button type="button" class="close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Dummy Modal Ends -->
                  <!-- Modal starts -->
                  <div class="text-center">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Click for demo<i class="ti-arrow-circle-right ms-1"></i></button>
                  </div>



////////////////////////////////////////////////////////////////////////////////////////////

  $data = $_POST['field_name'];
        $data1 = $_POST['field_size'];
        $data2 = $_POST['data_type'];
        $new_array = $var = [];
        for($i = 0;$i < count($data);$i++){
            $var = ["name" => $data[$i], "type" => $data1[$i], "datatype" => $data2[$i]];
            array_push($new_array, $var);
         }
       
        $dollar = "$";
      
        foreach ($new_array as $key => $t) {
            $final[] = "$word" . "table->" . $t['type'] . "('" . $t['name'] . "'," . $t['datatype'] . ")->nullable()";
            
        }
        $string = implode(";", $final);
        $string.= ";";
        $data6 = file_exists('../app/Models/' . $req->make . '.php');
        if ($data6) {
            return response()->json(['error' => true, 'message' => 'File already exists with the name ' . $req->make]);
        }
       
        $model = fopen('../app/Models/' . $req->make . '.php', "w") or die("Unable to open file!");
        $mytext = "<?php

             namespace App\Models;

            use Illuminate\Database\Eloquent\Factories\HasFactory;
            use Illuminate\Database\Eloquent\Model;
            use Illuminate\Foundation\Auth\\" . $req->make . " as Authenticatable;
            use Illuminate\Notifications\Notifiable;
           use Illuminate\Database\Eloquent\SoftDeletes;

          class " . $req->make . " extends Model
             {
           use HasFactory, Notifiable, SoftDeletes;

       public " . $word . "timestamps= false;
       protected " . $word . "table='" . strtolower($req->make) . "s';

             }";

                  