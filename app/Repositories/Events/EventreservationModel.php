<?php

namespace App\Repositories\Events;
 
use App\Models\EventReservation; 
use Exception;
use Illuminate\Http\Request;

class EventreservationModel{

  public function create_record($request) : bool
  {
      try {
           
          EventReservation::create([
              'event_name' => $request['Event_Name'],
              'number_of_tickets' => $request['Number_Of_Tickets'],
              'price' => $request['price'], 
              'start_date' => $request['start_date'],
              'end_date' => $request['End_date'],
              'business_id' => $request['BusinessUser_id'], 
          ]);

          return true;

      } catch (Exception $e) {

           throw $e;
          return false;
      }
  }

}



