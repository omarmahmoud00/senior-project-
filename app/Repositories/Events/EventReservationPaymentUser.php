<?php

namespace App\Repositories\Events;

use App\Interfaces\Reservations\CheckReservationPaymentUserInterface;
use App\Models\EventUserReservation;

class EventReservationPaymentUser implements CheckReservationPaymentUserInterface
{
    private $event_reservation_id;
    private $business_user_id;
    private $event_reservationPayment_user;

    public function __construct($event_reservation_id, $business_user_id)
    {
        $this->event_reservation_id = $event_reservation_id;
        $this->business_user_id = $business_user_id;
        $this->event_reservationPayment_user  = new EventReservationPaymentUserModel($this->event_reservation_id, $this->business_user_id);
    }

    public function payment_check(){
        if($this->event_reservationPayment_user){
            $records = $this->event_reservationPayment_user->get_all_records();
            return $this->isTherePaiedTicket($records);
        }
        return 0;
       
    }

    private function isTherePaiedTicket($records){
        $paid_users_id = $records->where('payment_status', 1)->pluck('user_id')->unique();

        if ($paid_users_id->isEmpty()) {
            return 0;
        }

        return $paid_users_id->toArray();
    }
}
