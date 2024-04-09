<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Subscribes\SubscribeClass;
use Illuminate\Support\Facades\Log;

class SubscribeController extends Controller
{
    public function index($newUserId,$card_id){  //
        
        $subscribe_obj = new SubscribeClass();

        $result = $subscribe_obj->createScbscribe($newUserId,$card_id);
        
        return $result;  
    
    }
}
