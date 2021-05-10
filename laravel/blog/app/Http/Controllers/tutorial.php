<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tutorial extends Controller
{
    //

    Public function show(Request $req)
    {

      //echo " Hello from space ".$id;
      return view('greeting');
      //print_r("f");
    }
}
