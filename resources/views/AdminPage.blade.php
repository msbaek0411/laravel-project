<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
    @extends('layouts.app')

@section('content')




@if(auth()->id() == 1 or auth()->id() == 17 )
    <div class="container"><Chat8 :current-user="{{ auth()->id() }}"></Chat8></div>
    @else
    <div class="container"><Chat6></Chat6></div>
    @endif
@endsection


    </body>
</html>
