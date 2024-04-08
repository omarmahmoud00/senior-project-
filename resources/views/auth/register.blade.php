{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <input type="hidden"   name="business_id" value="0">
            <input type="hidden"   name="user_type" value="0">
            <input type="hidden"   name="business_type" value="default">
        </div>
        
      

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('userLayouts.master')

@section('title', 'Sign Up')

@section('content')
<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">

    <div class="signup">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="chk" aria-hidden="true">Sign up</label>

            <!-- Name -->
            <input type="text" name="name" placeholder="User name" value="{{ old('name') }}" required="" autofocus>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Email Address -->
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required="">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Password -->
            <input type="password" name="password" placeholder="Password" required="">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <!-- Confirm Password -->
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required="">

            <!-- Hidden Inputs -->
            <input type="hidden" name="user_type" value="0">
            <input type="hidden" name="business_type" value="default">
            <input type="hidden" name="business_id" value="0">

            <button>Sign up</button>

            <a href="{{ route('Login') }}">Already registered?</a>
        </form>
         

    </div>
</div>
@endsection

@section('css')
<link href="{{ asset('assets/css/register.css') }}" type="text/css" rel="stylesheet" />
@endsection
