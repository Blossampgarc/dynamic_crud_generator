<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function subcategory()
    {
    	 $category = Category::all();
     
    	return view('layouts.subcategory')->with(compact('category'));
    }
         public function category(Request $request)
        {
             $category = Category::all();
             $categ = Category::select('category_name')->where('parent_id','id')->get();
             if($request->get('sort') == 'parent_id'){
            $category = Category::all();
            }

            if($request->get('sort') == 'parent_id_asc'){
            $category = Category::orderBy('parent_id','asc')->where('is_active',1)->get();
            }

            if($request->get('sort') == 'parent_id_desc'){
            $category = Category::orderBy('parent_id','desc')->where('is_active',1)->get();
            }
            if($request->get('sort') == 'parent_id_category'){
            $category = Category::where('parent_id',0)->where('is_active',1)->get();
            }
            if($request->get('sort') == 'parent_id_subcategory'){
            $category =Category::where('parent_id','!=',0 )->where('is_active',1)->get();
            }
            if($request->get('sort') == 'parent_id_asc'){
            $category = Category::orderBy('parent_id','asc')->where('is_active',1)->get();
            }
             // dd($products);
        	return view('layouts.category')->with(compact('category','categ'));
        }
         public function create_category(Request $request)
        {
            $ignore = $request->except(['_token' => '']);
            // dd($request->all());
            $res=Category::create($ignore);
     return redirect()->back()->with('status','record has been created');
        }

    public function edit_category($id)
    {

    }
    public function update_category(Request $request)
    {
      
    }
    public function delete_category(Request $request, $id)
    {
        
    }
}
