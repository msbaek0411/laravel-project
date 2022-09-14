@extends('layouts.app')

@section('content')

<div class="container">
    <Chat5 :current-user="{{ auth()->id() }}"></Chat5>
</div>
@endsection