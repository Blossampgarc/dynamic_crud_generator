<?php
    namespace App\Http\Controllers;
    use App\Models\employee;
    use App\Models\main;
    use App\Models;
    use App\Http\Requests\employeeRequest;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use validate;
    use validated;
    use soundex;
    class employeesController extends Controller
     {
        public function index()
          {
              $data = employee::where('is_active',1)->where('is_deleted',0)->get();
               return view('layouts.dal',compact('data'));
          }

          public function create()
          {
               return view('layouts.dal');
          }
    
          public function store(Request $request)
           {      
            $did = $request->id;
            if($request->has('image_path') && $request->image_path != null){
            $new_image_name = $request->file('image_path')->getClientOriginalName();
            $filename = pathinfo($new_image_name, PATHINFO_FILENAME);
            $extension = $request->file('image_path')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image_path')->move("images/",$fileNameToStore);
            $token_ignore = ['_token' => '', 'record_id' => '' ];
            $post_feilds = array_diff_key($_POST,$token_ignore);
            $post_feilds['image_path'] =  $path;
            $post_feilds['user_id']=Auth::id();
                 if (isset($_POST['record_id']) && $_POST['record_id'] != '') {
                  employee::where("id", $_POST['record_id'])->update($post_feilds);
                    $status = "Record has been updated";
                 }
                 else{
                  employee::create($post_feilds)->with('new_image_name');
                    $status = "Record has created";
                    }  
            return redirect()->back()->with('status', $status);
            }
           }

          public function show(Request $request)
          {
               // Get the search value from the request
              $search = $request->input('search');
            if( $search != '') {
              $posts = employee::query()
              ->whereRaw("soundex(name) = '".soundex($search)."'")
              ->orWhereRaw("soundex(address) = '".soundex($search)."'")
              ->orWhereRaw("soundex(department) = '".soundex($search)."'")->get();
              }
              else
              {
            $posts = employee::where("is_active", 1)->where("is_deleted", 0)->get();
            }
            return view('layouts.dal')->with(compact('posts'));
          }
          public function edit(Request $request, $id)
          {   
               $data=employee::find($id);
               return redirect()->back()->with(compact('data'));
               }     

          public function destroy($id)
          {
              $data = employee::find($id);
              $data->is_active = 0;
              $data->is_deleted = 1;
              $data->save();
              $data->delete();
             return redirect()->back()->with('stat','Record was deleted Successfully');
          }
    }
    