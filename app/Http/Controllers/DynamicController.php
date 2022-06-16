<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main;
use Illuminate\Support\Facades\Auth;
use validate;
use validated;

class DynamicController extends Controller
{
  public function index($slug='')
          {
              $data = 'App\Models'.$slug::where('is_active',1)->where('is_deleted',0)->get();
               return view('layouts.dynam',compact('data'));
          }

          public function create()
          {
               return view('layouts.dynam');
          }
    
          public function store(Request $request, $slug='')
           {
            $slog = main::where('name', '=', $slug )->first();
            $token_ignore = ['_token' => '', 'record_id' => '', ];
            $post_feilds = array_diff_key($_POST, $token_ignore);
            $post_feilds['user_id']=Auth::id();
                 if (isset($_POST['record_id']) && $_POST['record_id'] != '') {
                    'App\Models'.$slug::where("id", $_POST['record_id'])->update($post_feilds);
                    $status = "Record has been updated";
                 }
                 else{
                    'App\Models'.$slug::create($post_feilds);
                    $status = "Record has created";
                    }
            return redirect()->back()->with('status', $status);
           }

          public function main_show($slug='')
          {
            $data = "App\Models\\".$slug::where('is_active',1)->where('is_deleted',0)->get();
            return view('layouts.dynam')->with('data',$slug::all());
          }

          public function edit(Request $request, $id, $slug='')
          {   
               $data = 'App\Models'.$slug::find($id);
               return response()->json([
                'data' => $data,]);
         }     

          public function destroy($id, $slug='')
          {
              $data = 'App\Models'.$slug::find($id);
              $data->is_active = 0;
              $data->is_deleted = 1;
              $data->save();
              $data->delete();
             return redirect()->back()->with('stat','Record was deleted Successfully');
          } 
}
