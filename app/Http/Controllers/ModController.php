<?php
namespace App\Http\Controllers;
use App\Models\main;
use App\Models\employee;
use App\Models\permission;
use App\Models\role;
use App\Models\RolePermisssion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models;
use Routes;
use Artisan;
use File;
use Storage;
use Auth;

class ModController extends Controller
{
    public function dynamic(Request $request)
    {
    	//making request and model and anything dynamic 
    	$command = 'make:model';
        $commend = 'make:migration';
    	$params = [
    		        'name' => $_POST['command'],
    	           ];
    		Artisan::call($command,  $params);
    		Artisan::call('make:request', [
            'name' => $_POST['command'].'Request']);
      //Making a model
    			 $dollar = '$';
    			  $field = $_POST['field_name'];
            $datasize = $_POST['field_size'];
            $datatype = $_POST['data_type'];
			$new_array = $var = [];
      
        for($i = 0;$i < count($field);$i++){
           $var = ["name" => $field[$i], "type" => $datasize[$i], "datatype" => $datatype[$i]];
           $hel = array_push($new_array, $var);
         }
             foreach ($new_array as $key => $t) {
             	$str[] = "'". $t['name'] ."'";
}
          $mod = implode(",", $str);
        $mod.= " ";   
     $modelling = fopen("../app/Models/" . $request->command.".php" , "w");
     $completemodel = 
"<?php
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

        protected ".$dollar."table = '".$request->command."s';
        protected ".$dollar."fillable = [
           ".$mod."
        ];

         public function users(){
            return ".$dollar."this->belongsTo('App\Models\User', 'user_id', 'id');
        }
      protected ".$dollar."dates = ['deleted_at'];
    }
     ";

    fwrite($modelling, $completemodel);
            fclose($modelling);
 
//migration making
  			$field = $_POST['field_name'];
            $datasize = $_POST['field_size'];
            $datatype = $_POST['data_type'];
            $new_array = [];
            $migrating = fopen("../database/migrations/" . "2022_02_04_541234" . "_create_" .$request->command."s_table.php", "w");
               $new_array = $var = [];
             
        for($i = 0;$i < count($field);$i++){
         $var = ["name" => $field[$i], "type" => $datasize[$i], "datatype" => $datatype[$i]];
            array_push($new_array, $var);
         }
         foreach ($new_array as $key => $t) {
            $types[] = $t['datatype'];
            }
            $convertp = serialize($types);
             foreach ($new_array as $key => $t) {
                if ($t['datatype'] == "integer") {
            $final[] = "$dollar" . "table->" . $t['datatype'] . "('" . $t['name'] . "')->default(0)";
            }
            else
            {
              $final[] = "$dollar" . "table->" . $t['datatype'] . "('" . $t['name'] . "'," . $t['type'] . ")";
            }
}
            $string = implode(";", $final);
        $string.= "";
            $completemigration = 
"<?php
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
            ".$dollar."table->integer('status')->default(1);
            ".$dollar."table->timestamp('deleted_at')->nullable();
            ".$dollar."table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('".$request->command."s');
    }
}";
            fwrite($migrating, $completemigration);
            fclose($migrating);
Artisan::call('migrate');
     //main  tables condition

  $req = $request->command;
 $fields = $_POST['field_name'];
  $datasize = $_POST['field_size'];
            $datatype = $_POST['data_type'];
  $new_array = $var = [];

 for($i = 0;$i < count($fields);$i++){
    $var = ["name" => $fields[$i], "type" => $datasize[$i], "datatype" => $datatype[$i]];
   array_push($new_array, $var);
         }

         foreach ($new_array as $key => $t) {
      
            $finals[] = $t['name'];
            }
          

$convert = serialize($finals); 

 $newmain = new main;
               $newmain->user_id = Auth::id();
               $newmain->name = $request->command;
               $newmain->field_name = $convert;
               $newmain->field_type = $convertp;
               $newmain->save(); 
             
 return redirect()->back()->with('status','Controller, Model, Request made successfully');
}

}
