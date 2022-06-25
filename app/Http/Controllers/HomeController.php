<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // check user registration status
        
        if(auth()->user()->status == true){
            return view('dashboard');
        }
        else{
            return view('registration');
        }

        /**
         *  if (auth()->user()->role == 'admin') {
         *   return '/admin';
         *  }
         *  return '/home';
         */
    }
}
