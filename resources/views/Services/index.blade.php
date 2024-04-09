@extends('userLayouts.master')

@section('title', 'services')
 
@section('content')
 
<div>
    
<br>
<br>
<br>
<br> <br>

<div class="ag-format-container">
  @foreach ($services as $index => $service)
    <div class="ag-courses_box">
      <div class="ag-courses_item">
        <a href="{{route('card.index',['name' => $service->name])}}" class="ag-courses-item_link">
          @php
            $bgColorClass = 'bg-color-' . ($index % 6 + 1);
          @endphp
          <div class="ag-courses-item_bg {{ $bgColorClass }}"></div>
          <div class="ag-courses-item_content">
            <div class="ag-courses-item_title">
              {{ $service->name }}
              @php
                session(['service' => $service->name])
              @endphp
            </div>
           
          </div>
        </a>
      </div>
    </div>
  @endforeach
</div>





  @endsection
@section('css')
<link href="{{ asset('assets/css/services/service-index.css') }}" type="text/css" rel="stylesheet" />
 
@endsection


@section('javaScript')
 
  
@endsection