@extends('layouts.app')

@section('content')



    <!-- <Chat6 :current-user="{{ auth()->id() }}"></Chat6> -->

    @if(auth()->id() > 0)
    <div class="container"><Chat6 :current-user="{{ auth()->id() }}"></Chat6></div>
    @else
    <div class="container"><Chat6></Chat6></div>
    @endif


@endsection