<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Models\EventReservation;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Repositories\Events\EventRepository;

class EventController extends Controller
{
    private $event;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->event = new EventRepository(auth()->user()->id);
            return $next($request);
        });
    }

    public function index() {
        $event_records = $this->event->get_all();
        return view('admin.Reservations.Events.index', compact('event_records'));
    }

    public function create() {
        return view('admin.Reservations.Events.create');
    }

    public function insert(Request $request) {
       
        $this->validation($request);
        
        $this->event->setRequest_data($request);
        $event_result = $this->event->create();
        if ($event_result) {
            return redirect()->route('event.index')->with('success', 'The event has been added successfully.');
        } else {
            return redirect()->back()->withErrors('there is a problem');
        }
    } 

    public function delete($event_reservation_id) {
        $result = $this->event->delete($event_reservation_id);
        if ($result === 'deleted') {
            return redirect()->back()->with('success', 'The event has been deleted successfully.');
        }
        return $result; //redirect()->back()->withErrors('Delete operation failed: ' . $result);
    }

    public function update($id){
        $event_record = EventReservation::findOrFail($id); // Assuming you have a find method in your repository
        if (!$event_record) {
            return redirect()->route('event.index')->withErrors('Event not found.');
        }
        return view('admin.Reservations.Events.update', compact('event_record'));
    }

    public function edit(Request $updated_data){
        $this->validation($updated_data);
        $this->event->setRequest_data($updated_data);
        $event_result = $this->event->update();
        if ($event_result) {
            return redirect()->route('event.index')->with('success', 'The event has been UPDATED successfully.');
        } else {
            return redirect()->back()->withErrors('NOT UPDATED, there is a problem');
    }
    //    return $updated_data;
    

    }
    







    private function validation($request){
        if ($request->business_type != "Events") {
            return redirect()->back()->withErrors('it is Event Section');
        }
        
        $validatedData = $request->validate([
            'Event_Name' => 'required|string|max:255',
            'Number_Of_Tickets' => 'required|integer|min:1',
            'start_date' => 'required|date|after_or_equal:today',
            'End_date' => 'required|date|after:start_date',
            'price' => 'nullable|numeric|min:0',
        ]);
    }





}
