<?php

namespace App\Http\Controllers\subscriptions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Subscriptions\SubscriptionChecker;

class SubscriptionCheckerController extends Controller
{
    public function index(){
        $s = new SubscriptionChecker();
        return $s->subscriptionCheck(2);
    }
    
    
}
