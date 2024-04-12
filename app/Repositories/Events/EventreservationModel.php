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


  public function update_record($id, $data) : bool
    {
        try {
            $event = EventReservation::findOrFail($id); // Ensure the event exists
            
            $event->update([
                'event_name' => $data['Event_Name'],
                'number_of_tickets' => $data['Number_Of_Tickets'],
                'price' => $data['price'], 
                'start_date' => $data['start_date'],
                'end_date' => $data['End_date']
            ]);

            return true;

        } catch (Exception $e) {
            throw $e; // It's a good practice to rethrow the exception to let the caller handle it
        }
    }




}



