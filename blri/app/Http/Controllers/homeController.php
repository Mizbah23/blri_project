<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;

class homeController extends Controller
{
    public function index(){
      $setuptypes= setuptype::all();
      return view('home.index')->with('setuptypes',$setuptypes);
       }

       public function setup($type){
         dd($type);
         }
}
