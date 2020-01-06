<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlController extends Controller
{
   public function control(){
       return view('control_quincenal');
   }

    public function agregar_control()
    {
        return view('agregar_control');
    }
}
