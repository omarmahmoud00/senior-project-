<?php

namespace App\Interfaces\Reservations;

interface CheckReservationPaymentUserInterface {

    // Method to check if the payment for a reservation is complete
    public function payment_check(); 

}