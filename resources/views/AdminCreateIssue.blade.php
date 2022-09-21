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
		<h1 class="font-bold text-3xl">Issue Task</h1>
        <form action="/admin/issue/createuser" method="POST">
			@csrf
			<label class="block" for="userid">userid</label>
			<input class="border border-gray-800 w-full @error('userid') border border-red-700 @enderror" type="text" name="userid" id="userid" required value="{{ old('userid') ? old('userid') : '' }}"><br>
			@error('userid')
				<small class="text-red-700">{{ $message }}</small>
			@enderror

			<label class="block" for="img">img</label>
			<input class="border border-gray-800 w-full @error('img') border border-red-700 @enderror" type="text" name="img" id="img" required value="{{ old('img') ? old('img') : '' }}"><br>
			@error('img')
				<small class="text-red-700">{{ $message }}</small>
			@enderror


			<label class="block" for="title">title</label>
			<input class="border border-gray-800 w-full @error('title') border border-red-700 @enderror" type="text" name="title" id="title" required value="{{ old('title') ? old('title') : '' }}"><br>
			@error('title')
				<small class="text-red-700">{{ $message }}</small>
			@enderror

			<label class="block" for="artist">artist</label>
			<input class="border border-gray-800 w-full @error('artist') border border-red-700 @enderror" type="text" name="artist" id="artist" required value="{{ old('artist') ? old('artist') : '' }}"><br>
			@error('artist')
				<small class="text-red-700">{{ $message }}</small>
			@enderror

			
			<label class="block" for="href">href</label>
			<textarea class="border border-gray-800 w-full @error('href') border border-red-700 @enderror" name="href" id="href" cols="30" rows="10" required>{{ old('href') ? old('href') : '' }}</textarea><br>
			@error('href')
				<small class="text-red-700">{{ $message }}</small>
			@enderror
			
			<label class="block" for="contents">contents</label>
			<textarea class="border border-gray-800 w-full @error('contents') border border-red-700 @enderror" name="contents" id="contents" cols="30" rows="10" required>{{ old('contents') ? old('contents') : '' }}</textarea><br>
			@error('contents')
				<small class="text-red-700">{{ $message }}</small>
			@enderror

			<button class="bg-blue-600 text-white px-4 py-2 float-right">Submit</button>
		</form>
	</div>
</div>
@endsection

    </body>
</html>
