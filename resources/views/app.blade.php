<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('inc.style')
    <style>
      .form-error{
        font-size:12px;
        color:red;
        padding:6px 0px;
      }
    </style>
    <title>Icarus</title>
</head>

<body>
    
    @yield('content')
    @include('inc.modal')
    @include('inc.script')
</body>

</html>