@extends('layouts.app')

@section('content')

<div class="container">
    
    <Chat6 :current-user="{{ auth()->id() }}"></Chat6>
</div>
@endsection