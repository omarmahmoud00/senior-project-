@extends('adminDashboardLayouts.master')

@section('title')
  Update Event
@endsection

@section('content')
<form class="form-inline" action="{{ route('event.edit') }}" method="POST">
  @csrf
  <div class="form-group mb-2">
    <label for="EventName" class="sr-only">Event Name</label>
    <input type="text" class="form-control" id="EventName" name="Event_Name" placeholder="Event Name" value="{{ $event_record->event_name }}" required>
  </div>
  
  <div class="form-group mx-sm-3 mb-2">
    <label for="NumberOfTickets" class="sr-only">Number Of Tickets</label>
    <input type="number" class="form-control" id="NumberOfTickets" name="Number_Of_Tickets" placeholder="Number of Tickets" value="{{ $event_record->number_of_tickets }}" required>
  </div>
  
  <div class="form-group mb-2">
    <label for="StartDate" class="sr-only">Start Date</label>
    <input type="date" class="form-control" id="StartDate" name="start_date" value="{{ $event_record->start_date }}" required>
  </div>
  
   
  <label class="sr-only" for="inlineFormInputName2">End Date</label>
  <input type="date" name="End_date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="{{ $event_record->end_date }}" placeholder="dd/mm/yyyy" value="{{ old('End_date') }}" required>
 
   
  
  <div class="form-group mb-2">
    <label for="Price" class="sr-only">Price</label>
    <input type="number" class="form-control" id="Price" name="price" placeholder="Price" value="{{ $event_record->price }}">
  </div>
 
  <input type="hidden" value="{{ auth()->guard('is_BusinessUser')->user()->business_type }}" name="business_type">
  <input type="hidden" value="{{$event_record->id }}" name="id">

  <button type="submit" class="btn btn-primary mb-2">Update Event</button>
</form>
@endsection
@section('css')
 
@endsection


@section('js')
  
@endsection