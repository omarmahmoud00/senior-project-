@extends('userLayouts.master')

@section('title', 'login')

@section('content')
<div class="main">  	
    <input type="checkbox" id="chk" aria-hidden="true">

    
    <div>
        <br>
     <br> 
       <br>  <br>  <br>  <br>  <br>  <br><br>
    </div>
        {{-- <div class="signup">
            <form  method="POST" action="{{ route('register') }}">
     
                 @csrf 
                 @method('POST')

                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="name" placeholder="User name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">

                <input type="hidden" name="user_type" value="0">
                <input type="hidden" name="business_type"  value="default">
                <input type="hidden" name="business_id"  value="0">

                <button>Sign up</button>
            </form>
        </div> --}}

        <div class="login">
            <form method="POST" action="{{ route('login') }}">
        @csrf

                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button>Login</button>
            </form>
        </div>

</div>
@endsection

@section('css')
<link href="{{ asset('assets/css/register.css') }}" type="text/css" rel="stylesheet" />
  <link href="{{ asset('assets/css/home.css') }}" type="text/css" rel="stylesheet" />
    
@endsection


@section('javaScript')
 
@endsection