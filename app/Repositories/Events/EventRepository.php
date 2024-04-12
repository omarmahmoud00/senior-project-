<?php

namespace App\Repositories\Events;

use App\Models\EventReservation;
use App\Interfaces\Reservations\EventInterface; 
use App\Repositories\Events\EventReservationModel;
use App\Interfaces\Reservations\ReservationInterface;
use App\Repositories\Subscriptions\SubscriptionChecker;

class EventRepository implements EventInterface, ReservationInterface
{
    private $is_subscribed;
    private $request_data = [];
    private $business_user_id;

    public function __construct($business_user_id, $request = null)
    {
        $this->business_user_id = $business_user_id;
        $this->is_subscribed = (new SubscriptionChecker())->subscriptionCheck($business_user_id);
        $this->request_data = $request; 
    }

    public function setRequest_data($request) {
        $this->request_data = $request;
    }

    public function get_all() {
        return EventReservation::where('business_id', $this->business_user_id)->get();
    }

    public function create() {
        if ($this->is_subscribed) {
            $event_add_record = new EventReservationModel();
            return $event_add_record->create_record($this->request_data);
        }
        return 'Not allowed';
    }

    public function update() {
      if ($this->is_subscribed) {
        $event_add_record = new EventReservationModel();
        return $event_add_record->update_record($this->request_data->id,$this->request_data);
    }
    return 'Not allowed';
    }

    public function delete($event_reservation_id) {
        $eventPaymentChecker = new EventReservationPaymentUser($event_reservation_id, $this->business_user_id);
        $eventPaymentStatus = $eventPaymentChecker->payment_check();

        if ($eventPaymentStatus == 0) {  // Safe to delete
            return EventReservation::where('id', $event_reservation_id)
                                   ->where('business_id', $this->business_user_id)
                                   ->delete() ? 'deleted' : 'Delete failed';
        }
        return $eventPaymentStatus;
    }
}
