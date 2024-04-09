<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{ asset('assets/css/home.css') }}" type="text/css" rel="stylesheet" />
  <title>@yield('title')</title>

  @yield('css')

</head>
<body>
  @include('userLayouts.header')
       


  @include('userLayouts.footer')
  
  <body>
    <div class="content">
      @yield('content')
    </div>
  
  
  @yield('javaScript')

{{-- <script>
document.getElementById("demo").innerHTML = "Hello JavaScript!";
</script> --}}
</body>
</html>
