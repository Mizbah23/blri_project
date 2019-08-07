<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;

class categoryController extends Controller
{
  
    public function index(){
   $setuptypes= setuptype::all();
   return view('setup.category')->with('setuptypes',$setuptypes);
       }
 }
