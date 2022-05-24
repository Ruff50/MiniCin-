<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <title>MiniCiné</title>
</head>
<body class="w-full flex flex-col justify-between bg-gray-900">
@include('layouts/header') 
<main class="h-full">
   @yield('main')  
</main>   
@include('layouts/footer')
</body>
</html> 