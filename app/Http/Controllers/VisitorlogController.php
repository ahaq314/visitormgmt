<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorlogController extends Controller
{
   
    public function index(Request $request)
    {

       $visitor_id = request('vid');
     
       return view('visitor_log',compact('visitor_id'));
    }


}
