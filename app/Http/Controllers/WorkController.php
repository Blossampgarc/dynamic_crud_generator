<?php

namespace App\Http\Controllers;
use App\Models;
use Illuminate\Http\Request;
use Routes;
use Artisan;
use File;
use Storage;
class WorkController extends Controller
    {
        public function runartisan(Request $request){
     //making a simple controller model and request file
        	$command = 'make:model';
          $commend = 'make:migration';
    		$params = [
    		        'name' => $_POST['command'],
    		];
    			Artisan::call($command,  $params);
    			Artisan::call('make:request', [
            'name' => $_POST['command'].'Request']);
    			Artisan::call('make:controller', [
            'name' => $_POST['command'].'Controller']);
          // Artisan::call('make:migration', [
            // 'name' => 'create_'.$_POST['command'].'s_table']);
          // Artisan::call('make:view', [
          //   'name' => $_POST['command'].'s']);

     //mmaking routes for your controller for a normal crud
     $routing = '../routes/web.php';
        $search = '//kayy';
    $cc = "App\Http\Controllers\\" . $request->command .  "Controller@".$request->command."";
    $insert = "Route::resource('".$request->command."',".$request->command."Controller::class);";
    // dd($insert);

    $replace = $search . "\n" . $insert;
     file_put_contents($routing, str_replace($search, $replace, file_get_contents($routing)));

    //now creating function for the controller
      $controlling = fopen("../app/Http/Controllers/" . $request->command . "Controller.php", "w");
      $dollar = '$';

    $completecontroller = " 
    <?php

    namespace App\Http\Controllers;
    use App\Models\\".$request->command.";
    use App\Http\Requests\\".$request->command."Request;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use validate;
    use validated;
    class ".$request->command."Controller extends Controller
    {
       
        public function index()
          {
              ".$dollar."data=".$request->command."::where('is_active',1)->where('is_delete',0)->get();
              return view('".$request->command.".index',compact('data'));
          }

        
          public function create()
          {
            
               return view('".$request->command.".create');
          }  

         
          public function store(".$request->command."Request ".$dollar."request)
          {
               ".$dollar."data = new ".$request->command.";
               ".$dollar."data->user_id = Auth::id();
               ".$dollar."data->username = ".$dollar."request->input('username');
               ".$dollar."data->email = ".$dollar."request->input('email');
               ".$dollar."data->save();
             return redirect()->back()->with('status','Record was created succesfully');
          }

          public function show(".$dollar."id)
          {

          }

          public function edit(".$dollar."id)
          {   

               ".$dollar."data=".$request->command."::find(".$dollar."id);
               return view('".$request->command.".edit',compact('data'));
          }

          public function update(Request ".$dollar."request, ".$dollar."id)
          {
                ".$dollar."validatedData = ".$dollar."request->validate([
                'username' => 'required|max:255',
                'email' => 'required'
              ]);
              ".$request->command."::whereId(".$dollar."id)->update(".$dollar."validatedData);
              return redirect('blogs')->with('status', 'Record is successfully updated');
          }

          public function destroy(".$dollar."id)
          {

              ".$dollar."data = ".$request->command."::find(".$dollar."id);
              ".$dollar."data->is_active = 0;
              ".$dollar."data->is_delete = 1;
              ".$dollar."data->save();
              ".$dollar."data->delete();
             return redirect()->back()->with('status','Record was deleted Successfully');

          }
    }
    ";

    fwrite($controlling, $completecontroller);
            fclose($controlling);
    //making a model
     $modelling = fopen("../app/Models/" . $request->command.".php" , "w");
     $completemodel = "
    <?php
    namespace App\Models;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class  ".$request->command." extends Model
    {
        use HasFactory,SoftDeletes;

        protected ".$dollar."table = '".$request->command."';
        protected ".$dollar."fillable = [
            'user_id',
            'username',
            'email',
        ];

         public function users(){
            return ".$dollar."this->belongsTo('App\Models\User', 'user_id', 'id');
        }
      protected ".$dollar."dates = ['deleted_at'];
    }
     ";


    fwrite($modelling, $completemodel);
            fclose($modelling);

    //request for validation
            $requesting = fopen("../app/Http/Requests/" . $request->command . "Request.php", "w");
            $completerequest = "
            <?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class ".$request->command."Request extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules()
        {
            return [
                'username' => 'required',
               'email' => 'required|email|unique:new_blogs',
            ];
        }
        public function messages()
        {
            return [
                'username.required' => 'Name is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Incorrect format, Must add @ & .com',
                'email.unique' => 'This email already exist'
            ];
        }
    }

            ";
            fwrite($requesting, $completerequest);
            fclose($requesting);
            //making custom migration
            $field = $_POST['field_name'];
            $datasize = $_POST['field_size'];
            $datatype = $_POST['data_type'];
            $new_array = [];
            // dd($field, $datasize, $datatype);
            $migrating = fopen("../database/migrations/" . "2022_02_04_541234" . "_create_" .$request->command."s_table.php", "w");
               $new_array = $var = [];
             
            

        for($i = 0;$i < count($field);$i++){
            $var = ["name" => $field[$i], "type" => $datasize[$i], "datatype" => $datatype[$i]];
            array_push($new_array, $var);
         }
         
             foreach ($new_array as $key => $t) {
              // dd($_POST,$t);
                if ($t['datatype'] == "integer") {
            $final[] = "$dollar" . "table->" . $t['datatype'] . "('" . $t['name'] . "')->default(0)";
            }
            else
            {
              $final[] = "$dollar" . "table->" . $t['datatype'] . "('" . $t['name'] . "'," . $t['type'] . ")";
            }

}
            $string = implode(";", $final);
            // $string = explode("", $final);
        $string.= " ";
            $completemigration = "
            <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create".$request->command."sTable extends Migration
{
    
    public function up()
    {
        Schema::create('".$request->command."s', function (Blueprint ".$dollar."table) {

            ".$dollar."table->id();
            ".$dollar."table->integer('user_id')->default(0);
            ".$string.";
            ".$dollar."table->integer('is_active')->default(1);
            ".$dollar."table->integer('is_deleted')->default(0);
            ".$dollar."table->timestamp('deleted_at');
            ".$dollar."table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('".$request->command."s');
    }
}
            ";
            fwrite($migrating, $completemigration);
            fclose($migrating);
            Artisan::call('migrate');


    	


//last but not list our view file :)
//making views for crud generator

//first create file

$add = fopen("../resources/views/crud" . "/" . $request->command . "-add.blade.php", "w");
// $edit = fopen("../resources/views/crud" . "/" . $request->command . "-edit.blade.php", "w");
$display = fopen("../resources/views/layouts" . "/" . "tab.blade.php", "w");
$rbt = '{{route("' . $request->command . '_submit")}}';

 $fname = $_POST['field_name'];
 $arring = [];
 foreach ($fname as $key => $ind) {
$first[] = "
             <div class='form-group row'>
                  <div class='col-lg-6'>
                      <label class='col-lg-4 col-form-label'>". $ind . "<span class='text-danger'>*</span>
                                            </label>
                        <input id='" . $ind . "' class='form-control' name='" . $ind . "'  required autocomplete='text' placeholder='Enter your " . $ind . "' type='text'>
                  </div>

              </div>";

        }
  $imp = implode(" ", $first) . "<br>";
 $layt = "@extends('layouts.app')
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
 ";
 fwrite($add, $layt);
        fclose($add);

//display view page

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
        $lt = " 
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

fwrite($display, $lt);
        fclose($display);


  return view('layouts.createform')->with('status','Controller, Model, Request made successfully');
        }
}