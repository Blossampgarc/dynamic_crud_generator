<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\main;
use App\Models\emailsend;
use App\Models\Subscriber;
use App\Models;
use App\Models\Category;
use App\Mail\MailEmail;
use App\Mail\MailNewsletter;
use Illuminate\Support\Facades\Auth;
use validate;
use validated;
use Mail;

class MainsController extends Controller
{
   public function index()
          {
              $data = main::where('is_active',1)->where('is_deleted',0)->get();
               return view('layouts.maincrud',compact('data'));
          }

          public function show()
          {
            $data = main::where("is_active", 1)->where("is_deleted", 0)->where("status", 1)->get();
            return view('layouts.maincrud')->with('data',main::all());
          }

          public function destroy($id)
          {
              $data = main::find($id);
              $data->is_active = 0;
              $data->is_deleted = 1;
              $data->save();
              $data->delete();
            return view('layouts.maincrud')->with('stat','Record was deleted Successfully');
          }
          public function stat(Request $request, $id)
          {
      			 $user = main::select('status')->where('id', '=', $id)->first();
      			 if($user->status == '1'){
      			 $status = '0';
      			}
      			 else{
      			 $status = '1';
      			}
      			 $values = array('status' => $status);
      			 $hehe = main::where('id' , '=', $id)->update($values);
      			 return redirect()->back();
          }
           public function rolespage()
              {
                  return view('layouts.role_assign');
              }
           public function roles()
              {
                    $user = Auth::user();
                    if ($user->role_id != 1) {
                        return redirect()->back()->with('error', "No Link found");
                    }
                  $att_tag = attributes::where('is_active', 1)->select('attribute')->distinct()->get();
                    $attributes = attributes::where('is_active', 1)->get();
                    $role_assign = role_assign::where('is_active', 1)->where("role_id", $user->role_id)->first();

                    return view('layouts.role_assign')->with(compact('attributes', 'att_tag', 'role_assign'));
              }
            public function role_submit(Request $request)
              {
               $token_ignore = ['_token' => ''];
                $post_feilds = array_diff_key($_POST, $token_ignore);
                // dd($request->file('img'));
                if ($request->file('img') != '') {
                    $cover_path = ($request->file('img'))->store('logo/' . md5(Str::random(20)), 'public');
                    $post_feilds['img'] = $cover_path;
                }

                try {
                    attributes::insert($post_feilds);
                    return redirect()->back()->with('message', 'Information updated successfully');
                } catch (Exception $e) {
                    return redirect()->back()->with('error', 'Error will saving record');
                }
             }

          public function roles_assigning(Request $request)
          {
             $data = RolePermission::where("is_active", 1)->where("is_deleted", 0)->get();
             return view('layouts.dynam')->with('data',RolePermission::all());
          }

    public function dmail()
          {

        return view('layouts.emailit');
          }

           public function emailable(Request $request)
          {
           $ignore = $request->except(['_token' => '','submit']);
        
        $res=emailsend::create($ignore);
        $details = [
                    'name' => $request->get('name'),
                    'email' =>  $request->get('email'),
                    'message' => $request->get('message'),
                ];
       Mail::to('Blossampgrc094@gmail.com')->send(new MailNewsletter($details));
      

        return redirect()->back()->with('status','record has been created');
          }


            public function newslet()
          {

        return view('emails.newsit');
          }

           public function newletit()
          {
           $ignore = $request->except(['_token' => '','submit']);
        dd($request->all());
        $res=Subscriber::create($ignore);
        $details = [
                    'email' => $request->get('email'),
                ];
       Mail::to('Blossampgrc094@gmail.com')->send(new MailEmail($details));
      

        return redirect()->back()->with('status','record has been created');

          }

}
