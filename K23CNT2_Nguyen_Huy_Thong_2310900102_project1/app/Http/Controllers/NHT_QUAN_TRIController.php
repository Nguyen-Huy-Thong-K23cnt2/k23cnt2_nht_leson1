<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NHT_QUAN_TRIController extends Controller
{
    //

    // get login 
    public function nhtlogin(){
    return view('nhtlogin.nht-login');
    }
     //post login 
     public function nhtloginSubmit(request $REQUEST){
        return view('nhtlogin.nht-login');
        }
}
