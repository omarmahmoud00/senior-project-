<?php

namespace App\Repositories\Subscriptions;
 
use App\Interfaces\Subscriptions\SubscriptionCheckerInterface;
use App\Repositories\Subscriptions\SubscripeModel;

class SubscriptionChecker implements SubscriptionCheckerInterface {


    public function subscriptionCheck($id){
            $s = new SubscripeModel($id);
         return  $s->expiredOrNot();

     }
 




}




