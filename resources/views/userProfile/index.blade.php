@extends('userLayouts.master')

@section('title', 'Profile')


@section('content')
<div class="main">
    @if(Auth::check())
        <div class="user-info">
            <h2>User Profile</h2>
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p><br>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p><br>  
            <p><strong>user_type:</strong>@if (Auth::user()->user_type == 0) Normal User @else Admin User @endif</p><br>
            <p><strong>business_type:</strong> {{  Auth::user()->business_type }}</p><br> 
            <p><strong>business_id:</strong> {{  Auth::user()->business_id  }}</p><br>
 
        </div>
    @else
        <p>User is not authenticated.</p>
    @endif
</div>
@endsection
@section('css')
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        font-family: 'Jost', sans-serif;
        background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
    }
    .main {
        width: 350px;
        height: auto; /* Adjusted to auto for flexible content */
        background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
        border-radius: 10px;
        box-shadow: 5px 20px 50px #000;
        padding: 20px; /* Added padding for content */
    }
    .user-info {
        color: #fff; /* Ensuring text is visible on background */
        text-align: center; /* Centering text */
    }
    .user-info h2 {
        margin-bottom: 20px;
    }
    /* Other styles... */
</style>
@endsection

@section('javaScript')
 
@endsection

