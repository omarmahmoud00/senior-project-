@extends('userLayouts.master')

@section('title', 'services')


@section('content')
 
<div>
    
<br>
<br>
<br>
<br> <br>

</div>


<div class="container">
  <div class="card card-1">
    <h2>{{$basic->title}}</h2> 
   
 
    @if(Auth::check())
   
    @if (Auth::user()->user_type == 1)
    <button class="edit-button">Edit</button>
  
    @endif
  
    @endif
     
  
    <h3>${{$basic->price}}<span>/year.</span></h3>
    
    <p>one year</p>
    <ul>
      @php
        $info = preg_split("/\.(?<!\w)/", $basic->info);
      @endphp
      @for ($i = 0 ; $i<count($info); $i++)
      <li class="aval">{{$info[$i]}}</li> 
      
      @endfor
    </ul>
    
    
    <form action="{{route('business.registration')}}" method="get">
      @csrf

        <input type="hidden" name="card_id" value="{{session(['card_id' => $basic->id])}}">
      <button type="submit" class="select">Choose this plan</button>
        
    </form>
    
  </div>

<div class="card card-2 hot-badge">
  <h2>{{$standard->title}}</h2>

  @if(Auth::check())
   
  @if (Auth::user()->user_type == 1)
  <button class="edit-button">Edit</button>

  @endif

  @endif
  <h3>${{$standard->price}}<span>/year.</span></h3>
  <p>two years</p>
  <ul>
    @php
      $info = preg_split("/\.(?<!\w)/", $standard->info);
    @endphp
    @for ($i = 0 ; $i<count($info); $i++)
    <li class="aval">{{$info[$i]}}</li> 
    
    @endfor
  </ul>
  
  
  <form action="{{route('business.registration')}}" method="GET">
    @csrf
    <input type="hidden" name="card_id" value="{{session(['card_id' => $standard->id])}}">

    <button type="submit" class="select">Choose this plan</button>
      
  </form>

</div>

<div class="card card-3">
  <h2>{{$Premium->title}}</h2>

  @if(Auth::check())
   
  @if (Auth::user()->user_type == 1)
  <button class="edit-button">Edit</button>

  @endif

  @endif
    
  <h3>${{$Premium->price}}<span>/year.</span></h3>
  <p>three years</p>
  <ul>
    @php
      $info = preg_split("/\.(?<!\w)/", $Premium->info);
    @endphp
    @for ($i = 0 ; $i<count($info); $i++)
    <li class="aval">{{$info[$i]}}</li> 
    
    @endfor
  </ul>

    <form action="{{route('business.registration')}}" method="get">
      @csrf
      <input type="hidden" name="card_id" value="{{session(['card_id' => $Premium->id])}}">

      <button type="submit" class="select">Choose this plan</button>
        
    </form>

</div> 

@endsection
@section('css')
<link href="{{ asset('assets/css/services/card/index.css') }}" type="text/css" rel="stylesheet" />
 
@endsection


@section('javaScript')
 
  
{{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script type="text/javascript" src="{{asset('assets/js/services/service-index.js')}}"></script> --}}

    @endsection