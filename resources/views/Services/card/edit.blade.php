@extends('userLayouts.master')

@section('title', 'services edit')

@section('content')
<div>
    
    <br>
    <br>
    <br>
    <br> <br>
<form class="card-form" action="/submit-form" method="POST">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="info">Info</label>
        <input type="text" id="info" name="info">
    </div>
    <button type="submit">Submit</button>
</form>

@endsection
@section('css')
<link href="{{ asset('assets/css/services/card/edit.css') }}" type="text/css" rel="stylesheet" />
 
@endsection


@section('javaScript')
 
  
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

    <script type="text/javascript" src="{{asset('assets/js/services/service-index.js')}}"></script>
@endsection