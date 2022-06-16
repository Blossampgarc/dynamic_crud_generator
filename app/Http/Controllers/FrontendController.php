<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
    	return view('layouts.dashb');

    }

  // public function create_form() {
  //   	return view('layouts.form');

  //   }

      public function ourtable() {
    	return view('layouts.tab');

    }
          public function crud() {
    	return view('layouts.createform');

    }
       public function modal() {
      return view('layouts.dal');

    }
}
