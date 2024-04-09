<?php


namespace App\Repositories\Events;
 
use App\Models\EventReservation;
use App\Interfaces\Reservations\EventInterface; 
use App\Repositories\Events\EventreservationModel;
use App\Repositories\Subscriptions\SubscriptionChecker;
use  App\Interfaces\Reservations\ReservationInterface;
class EventRepository implements EventInterface , ReservationInterface
{

    private $is_subscripied;
    private $request_data=[];
    private $business_user_id;

      public function __construct($business_user_id,$request=null)
      {
        $this->business_user_id=$business_user_id;
         $this->is_subscripied = new SubscriptionChecker();
        $this->is_subscripied = $this->is_subscripied->subscriptionCheck($business_user_id);
        $this->request_data = $request; 
      }

      public function get_all(){
        return EventReservation::where('business_id',  $this->business_user_id)->get();
      }

        public function create(){
               if($this->is_subscripied) {
                $event_add_record = new EventreservationModel();
                $result = $event_add_record->create_record($this->request_data);
                return $result;
                // return $this->request_data;
               }
               else return 'Not allowed';
                
        }
        
    public function update(){

    }
    public function delete(){

    }



}