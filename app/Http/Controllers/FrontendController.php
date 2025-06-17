<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class FrontendController extends Controller
{
    public function home()
    {
        
        return view('frontend.home.index');
    }
}