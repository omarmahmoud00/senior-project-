@extends('adminDashboardLayouts.master')

@section('title')
  Admin Dashboard
@endsection

@section('content') 

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">All bookings</h4>
      <p class="card-description">
        <a  class="btn btn-info btn-rounded btn-fw" href="{{route('event.create')}}">Create One </a>

      </p>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Event Name</th>
              <th>Number Of Tickets</th>
              <th>Price</th>
              <th>Start Date</th>
              <th>End Date</th>
            </tr>
          </thead>

          <tbody>
         
            @foreach ( $event_records as $event_record )
            <tr>
              <td>{{$event_record->event_name}}</td>
              <td>{{$event_record->number_of_tickets}}</td>
              <td>{{$event_record->price}}</td>
              <td>{{$event_record->start_date}}</td>
              <td>{{$event_record->end_date}}</td>
              <td class="btn btn-secondary btn-rounded btn-fw" >More Info</td>
              <td class="btn btn-warning btn-rounded btn-fw">update</td>
              <td class="btn btn-danger btn-rounded btn-fw">delete</td> 
            </tr>
            @endforeach
          

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection



@section('css')
 
@endsection


@section('js')
  
@endsection