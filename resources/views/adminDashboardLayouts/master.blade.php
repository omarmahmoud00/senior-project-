<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- base:css -->


  @include('adminDashboardLayouts.cssFiles')
  @yield('css')
  
</head>
<body>

  <div class="container-scroller d-flex">
   
    @include('adminDashboardLayouts.sidebar')

    @include('adminDashboardLayouts.header')

    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>

@endif

  
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif



      <!-- partial -->
      @yield('content')
    
   @include('adminDashboardLayouts.footer')

   

  <!-- base:js -->
  @yield('js') //


 @include('adminDashboardLayouts.jsFiles')
</body>

</html>