
@extends('userLayouts.master')

@section('title', 'business Registration')

@section('content')
<div class="main">
   

    <div class="signup">
       
<form method="POST" action="{{ route('business.registration.store') }}">
    @csrf

    <label for="chk" aria-hidden="true">Business Sign Up</label>

    <!-- Business Name -->
    <input type="text" name="business_name" placeholder="Business Name" value="{{ old('business_name') }}" required autofocus>
    @error('business_name')
        <div class="error">{{ $message }}</div>
    @enderror

    <!-- Business Email Address -->
    <input type="email" name="business_email" placeholder="Business Email" value="{{ old('business_email') }}" required>
    @error('business_email')
        <div class="error">{{ $message }}</div>
    @enderror

    <!-- Business Password -->
    <input type="password" name="business_password" placeholder="Password" required>
    @error('business_password')
        <div class="error">{{ $message }}</div>
    @enderror

    <!-- Confirm Business Password -->
    <input type="password" name="business_password_confirmation" placeholder="Confirm Password" required>

    <!-- Business Type -->
   
    <input type="text" name="business_type" placeholder="" value="{{  session('service')}}" required>

   
    @error('business_type')
        <div class="error">{{ $message }}</div>
    @enderror

      
    <!-- Phone Number -->
    <input type="text" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" required>
    @error('phone_number')
        <div class="error">{{ $message }}</div>
    @enderror

    <!-- Address -->
    <textarea name="address" placeholder="Business Address" required>{{ old('address') }}</textarea>
    @error('address')
        <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit">Sign Up</button>

    <a href="#">Already registered?</a>
</form>
        
         

    </div>
</div>
@endsection

@section('css')
{{-- <link href="{{ asset('assets/css/register.css') }}" type="text/css" rel="stylesheet" />
 --}}


 <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    form label {
        display: block;
        margin-bottom: 10px;
        font-size: 24px;
        color: #333;
    }
    form input, form select, form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }
    form button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    form button:hover {
        background-color: #0056b3;
    }
    .error {
        color: red;
        margin-bottom: 15px;
    }
    a {
        display: block;
        margin-top: 20px;
        text-align: center;
        color: #007bff;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
@endsection


@section('javaScript')
<script src="{{ asset('js/businessValidation.js') }}"></script>
@endsection
