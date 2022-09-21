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

<div class="container">

    <div class="px-64">
		<h1 class="font-bold text-3xl">Edit Task</h1>
        <form action="/admin/createuser" method="POST">
			@csrf
			<label class="block" for="name">name</label>
			<input class="border border-gray-800 w-full @error('name') border border-red-700 @enderror" type="text" name="name" id="name" required value="{{ old('name') ? old('name') : '' }}"><br>
			@error('name')
				<small class="text-red-700">{{ $message }}</small>
			@enderror
            <label class="block" for="password">password</label>
			<input class="border border-gray-800 w-full @error('password') border border-red-700 @enderror" type="password" name="password" id="password" required value="{{ old('password') ? old('password') : '' }}"><br>
			@error('password')
				<small class="text-red-700">{{ $message }}</small>
			@enderror
			
			<label class="block" for="email">email</label>
			<textarea class="border border-gray-800 w-full @error('email') border border-red-700 @enderror" name="email" id="email" cols="30" rows="10" required>{{ old('email') ? old('email') : '' }}</textarea><br>
			@error('email')
				<small class="text-red-700">{{ $message }}</small>
			@enderror
			
			<button class="bg-blue-600 text-white px-4 py-2 float-right">Submit</button>
		</form>
	</div>
</div>
@endsection

    </body>
</html>
