<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Events\EventRepository;

class EventController extends Controller
{
        public function  index() {
            $event = new EventRepository(auth()->user()->id);
            $event_records = $event->get_all();
            return view('admin.Reservations.Events.index',compact('event_records'));
        }

        public function create(){
            return view('admin.Reservations.Events.create');
        }

        public function  insert(Request $request) {
            // dd($request->all()); 
            if($request->business_type!="Events") redirect()->back()->withErrors('it is Event Section');
            $validatedData = $request->validate([
                'Event_Name' => 'required|string|max:255', 
                'Number_Of_Tickets' => 'required|integer|min:1', 
                'start_date' => 'required|date|after_or_equal:today', 
                'End_date' => 'required|date|after:start_date',  
                'price' => 'nullable|numeric|min:0', 
            ]);
        
            $creat_event = new EventRepository($request->BusinessUser_id,$request);
            if($creat_event){
                $event_result=$creat_event->create();
                if($event_result){ 
                    return redirect()->route('event.index')->with('success', 'The event has been added successfully.');
                }else{
                    return redirect()->back()->withErrors('there is a problem');
         
                }
            }
           
            return redirect()->back()->withErrors('there is a problem');
        } 

}
