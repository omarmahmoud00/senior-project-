<?php

namespace App\Repositories\Events;

use App\Models\EventUserReservation;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EventReservationPaymentUserModel {
    protected $evnet_reservation_id;
    protected $business_user_id;

    
    public function __construct(  $evnet_reservation_id,   $business_user_id) {
        $this->evnet_reservation_id = $evnet_reservation_id;
        $this->business_user_id = $business_user_id;
    }
 
    public function get_all_records()  {
        try {
            $records = EventUserReservation::where('event_reservation_id', $this->evnet_reservation_id)
                                           ->where('business_user_id', $this->business_user_id) 
                                           ->get();
            return $records;
        } catch (Exception $e) {
            // Optionally, you can handle the exception in a way that's appropriate for your application
            throw new Exception("Failed to retrieve records: " . $e->getMessage());
        }
    }
}
