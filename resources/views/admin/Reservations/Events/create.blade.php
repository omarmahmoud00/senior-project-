@extends('adminDashboardLayouts.master')

@section('title')
  Create Dashboard
@endsection

@section('content') 

<form class="form-inline" action="{{ route('event.insert') }}" method="POST">
  @csrf
  <label class="sr-only" for="inlineFormInputName2">Event Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="Event_Name" value="{{ old('Event_Name') }}" required>

  <label class="sr-only" for="inlineFormInputGroupUsername2">Number Of Tickets</label>
  <div class="input-group mb-2 mr-sm-2">
      <input type="number" name="Number_Of_Tickets" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Number Of Tickets" value="{{ old('Number_Of_Tickets') }}" required>
  </div>
  
  <label class="sr-only" for="inlineFormInputName2">Start Date</label>
  <input type="date" name="start_date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="dd/mm/yyyy" value="{{ old('start_date') }}" required>

  <label class="sr-only" for="inlineFormInputName2">End Date</label>
  <input type="date" name="End_date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="dd/mm/yyyy" value="{{ old('End_date') }}" required>
 
  <label class="sr-only" for="inlineFormInputName2">Price</label>
  <input type="number" name="price" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="{{ old('price') }}">

  <input type="hidden" value="{{ auth()->guard('is_BusinessUser')->user()->id }}" name="BusinessUser_id">
  <input type="hidden" value="{{ auth()->guard('is_BusinessUser')->user()->business_type }}" name="business_type">

  <br><br>
  <button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>

@endsection



@section('css')
 
@endsection


@section('js')
  
@endsection