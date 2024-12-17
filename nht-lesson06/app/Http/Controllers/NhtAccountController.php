<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NhtAccountController extends Controller
{
    //form login - get 
    public function nhtLogin(){
        return view('nht-login');
    }
}
