<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //

     public function index(){

      $services = Service::all();

         
        return view('Services.index',compact('services'));
        // return $services;
     }

        public function edit(){
            return view('Services.card-edit');
     }





}
