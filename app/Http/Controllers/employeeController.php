<?php
    namespace App\Http\Controllers;
    use App\Models\main;
    use App\Models;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use validate;
    use validated;
    class employeeController extends Controller
     {
        public function index($slug='')
          {

            $model = 'App\Models\\'.$slug;
            return view('layouts.dynam',compact('data'));
          }

          public function create()
          {
               return view('layouts.dynam');
          }
    
          public function store(Request $request, $slug='')
           {
            $status = '';
            $messages = '';
         //validating data types //
       $rules = ([
             'string' => 'required|max:16000',
             'date' => 'required|date',
             'integer' => 'required|numeric|max:11',
             'mediumText' => 'required|min:10|max:16000',
             'text' => 'required|min:1|max:255',
             'image' => 'mimes:bmp,png,jpg,jpeg,jfif,pjpeg,pjp,svg',
             'video' => 'mimes:mp4,mov,wmv,avi,avchd,flv,f4v,swf,mkv',
             'editor' => 'required',
        ]);
            $array=array();
             $slog = main::where('name', '=', $slug )->first(); 
             $unsertype = unserialize($slog->field_type);
             $unser = unserialize($slog->field_name);
            $new_array = $var = [];
          for($i = 0;$i < count($unser);$i++){
              $var[] = ["name" => $unser[$i], "type" => $unsertype[$i]];
                   }
                  foreach ($var as $key => $v) {
                  
                  if($v['type'] != $rules['string']){
             $messages = ([
             'string.required' => 'This field is required! Please fill it',
             'string.max' => 'Your text is too long! It cannot exceed more than 16000 letters.',
        ]);
                 }
                  if($v['type'] != $rules['mediumText']){
                  $messages = ([
             'mediumText.required' => 'Your image or video field cannot be empty.',
             'mediumText.min' => 'Your image or video path is too short', 
             'mediumText.max' => 'Your image or video path is too long',
        ]);
                 }
                  if($v['type'] != $rules['date']){
                  $messages = ([
             'date.required' => 'Date field cannot be empty',
             'date.date' => 'Please add a valid date format',
        ]);
                 }
                  if($v['type'] != $rules['text']){
                  $messages = ([
            'text.required' => 'This field is required',
             'text.min' => 'This field cannot be empty',
        ]);
                 }
                  if($v['type'] != $rules['integer']){
                  $messages = ([
             'integer.required' => 'Please fill the field.',
             'integer.numeric' => 'Wrong Data type! You can only add numbers in this field.',
             'integer.max' =>'You cannot add more than 11 numbers.',
        ]);
                 }  
              }
             $model = 'App\Models\\'.$slug;
            $token_ignore = ['_token' => '', 'record_id' => ''];
            $post_fields = array_diff_key($_POST, $token_ignore);
            $post_fields['user_id']=Auth::id();
// dd($request->all());
        if($request->hasFile('image')){
            $new_image_name = $request->file('image')->getClientOriginalName();

            $filename = pathinfo($new_image_name, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->move("images/",$fileNameToStore);
            $post_fields['image'] = $path;
                 if (isset($_POST['record_id']) && $_POST['record_id'] != '')
                  {
                     $model::where("id", $_POST['record_id'])->update($post_fields);
                    $status = "Record has been updated";
                 }
                 else{
                   $hare = $model::create($post_fields);
                    $status = "Record has created";
                    }
        }
        if($request->hasFile('video')){
            $new_vid_name = $request->file('video')->getClientOriginalName();
             // dd($new_vid_name);
            $filename = pathinfo($new_vid_name, PATHINFO_FILENAME);
            $extension = $request->file('video')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('video')->move("videos/",$fileNameToStore);
            $post_fields['video'] = $path;
                 if (isset($_POST['record_id']) && $_POST['record_id'] != '') 
                  {
                     $model::where("id", $_POST['record_id'])->update($post_fields);
                    $status = "Record has been updated";
                 }
                 else{
                   $hare = $model::create($post_fields);
                    $status = "Record has created";
                    }
        }
       if($request->all() != ''){
           $model = 'App\Models\\'.$slug;
            $slog = main::where('name', '=', $slug )->first();
            $token_ignore = ['_token' => '', 'record_id' => '', ];
            $post_fields = array_diff_key($_POST, $token_ignore);
            $post_fields['user_id']=Auth::id();
                 if (isset($_POST['record_id']) && $_POST['record_id'] != '')
                  {
                    $model::where("id", $_POST['record_id'])->update($post_fields);
                    $status = "Record has been updated";
                 }
                 else{
                   $hare = $model::create($post_fields);
                    $status = "Record has created";
                    }
        }
        return redirect()->back()->with('status', $status);
        }

          public function show(Request $request, $slug='')
          {
            $model = 'App\Models\\'.$slug;
            $mod = $model::all();
            $slog = main::where('name', '=', $slug )->first(); 
            $unser = unserialize($slog->field_name);
            $unsertype = unserialize($slog->field_type);
            $data = $model::where("is_active", 1)->where("is_deleted", 0)->get();
            return view('layouts.dynam')->with(compact('unser','data','mod','slug'));
          }

          public function edit(Request $request, $id, $slug='')
          {   
            $model = 'App\Models\\'.$slug;
            $data = $model::find($id);

            return response()->json([
                'data' => $data]);
         }   

          public function destroy($slug='',$id='')
          { 
            $model = 'App\Models\\'.$slug;
            $data = $model::find($id);
            $data->is_active = 0;
            $data->is_deleted = 1;
            $data->save();
            $data->delete();
            return redirect()->back()->with('stat','Record was deleted Successfully');
          }

          public function changestatus(Request $request, $slug='', $id){
             $model = 'App\Models\\'.$slug;
           $user = $model::select('status')->where('id', '=', $id)->first();
           if($user->status == '1'){
          $status = '0';
          }
          else{
          $status = '1';
          }
          $values = array('status' => $status);
          $hehe = $model::where('id' , '=', $id)->update($values);
          return redirect()->back();
          }
    }