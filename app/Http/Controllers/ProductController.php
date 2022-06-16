<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producting;
use Auth;
class ProductController extends Controller
{
    public function fetchproduct(Request $request )
    {
      $products='';
      $mint = $request->get('min'); // min price value
      $maxt = $request->get('max'); // max price value
             
      $products = producting::where('price', '>=', $mint)->where('price', '<=', $maxt)->orderby('price', 'ASC')->get();
              
      if($products){
       $htmling = '';
       $gg='';
       $img='';
       $status='';
        foreach ($products as $p) {
         $gg = asset('images/'.$p->image);
         $img = asset('images/default-no-image.jpg');
         $price = $p->price;
         $name = $p->product_name;
         $empty = ($p->image != "");

          $htmling .= '<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 ">
                          <figure class="effect-text-in">';

          if($p->image != ""){

              $htmling .= '<img src="'.$gg.'" alt="image"  width="100" height="150">';
          }
          else {

              $htmling .= '<img src="'.$img.'" width="100" height="150">';
          }
           $htmling .= '<figcaption>
              <h4>'.$name.'</h4>
              <p>'.$price.'</p>
            </figcaption>
          </figure>
         </div>';
                       
   }
  }
            return response()->json(['body' => $htmling]);
    }
	 public function product(Request $request)
        {
             $products='';
        // Get the search value from the request
              $search = $request->input('search');
              $category = '';
             if( $search != '') {
              $category = producting::query()
              ->whereRaw("soundex(product_name) = '".soundex($search)."'")
              ->orWhereRaw("soundex(description) = '".soundex($search)."'")
              ->get();
              }
              else
              {
            $category = producting::where("is_active", 1)->where("is_deleted", 0)->get();
            }
            // return response()->json();

        	return view('layouts.product')->with(compact('category','products'));
        }

         public function create_product(Request $request)
        {
            // $ignore = $request->except(['_token' => '']);
            // dd($request->image);
  if($request->has('image') && $request->image != null){
            $new_image_name = $request->file('image')->getClientOriginalName();
              // dd($new_image_name);
            $filename = pathinfo($new_image_name, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->move("images/",$fileNameToStore);
            $token_ignore = ['_token' => '', 'record_id' => '' ];
            $post_feilds = array_diff_key($_POST,$token_ignore);
            $post_feilds['image'] =  $fileNameToStore;
            $res=producting::create($post_feilds);
     return redirect()->back()->with('status','record has been created');
        }
      }
        public function edit_product($id)
    {
               $data = producting::find($id);
               return response()->json([
                'data' => $data]);
    }
    public function update_product(Request $request)
    {

    }
    public function delete_product(Request $request, $id)
    {
             $data = producting::find($id);
              $data->is_active = 0;
              $data->is_deleted = 1;
              $data->save();
              $data->delete();
            return redirect()->back()->with('stat','Record was deleted Successfully');  
    }



}
