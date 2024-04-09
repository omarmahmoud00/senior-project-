<?php

namespace App\Repositories\Subscriptions;

use App\Interfaces\Eloquents\EloquentInterface;
use App\Models\Subscribe;
use DateTime;
use Exception;
class SubscripeModel implements EloquentInterface {

     
    private $id;
    private $subscripe_record;

    /*
        this class defines a `SubscripeModel` class that manages subscription records. 
        It fetches a subscription record by ID and checks if the subscription has expired by comparing
        the current date with the subscription's end date. If expired, the subscription status is set 
        to 'Inactive'.
    */


    public function __construct($id)     
    {   $this->id=$id;      
        $this->subscripe_record =  new Subscribe();
        $this->subscripe_record = $this->subscripe_record->findRecord($this->id);
    }

    public function expiredOrNot(){
        if($this->subscripe_record == null) return 0; // not subscriped  

        try {
            $currentDate = new DateTime();
            $formattedCurrentDate = $currentDate->format('Y-m-d');

            if ($formattedCurrentDate <= $this->subscripe_record->end_date) {
                return 1; // subscriped
            } else {
                
                $this->subscripe_record->status = 'Inactive';  
                $this->subscripe_record->save();
                return 0;  // the subscribtion is expired
            }
        } catch (Exception $e) {
            
            throw $e;
        }
    }


    }

 