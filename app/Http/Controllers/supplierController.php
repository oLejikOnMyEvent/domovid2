<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\supplier;

class supplierController extends Controller
{
  public function welcome (){

        $image_sup = \App\supplier::all();
      return view('welcome',['image_sup' => $image_sup]);

dd($image_sup);
  }
}


