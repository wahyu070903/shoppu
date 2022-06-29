<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset=utf-8>
	<meta name=csrf-token content="{{ csrf_token() }}">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="absolute top-1/2 -translate-x-1/2 -translate-y-1/2 left-1/2 w-4/5 h-fit sm:w-2/4 sm:h-5/6 flex flex-row rounded-lg bg-white shadow-lg">
		<div class="hidden sm:block sm:w-1/2 sm:h-full">
			<img class="hidden sm:block w-full h-full object-cover rounded-l-lg" src="{{ asset('images/app_images/shopping-cart.png') }}">
		</div>
		<div class="w-full sm:w-1/2 px-6 py-12">
			<div class="w-full flex justify-end items-center">
				<a class="text-xs text-blue-600" href="login">already have account?</a>
			</div>
			<form method="post" action="register">
				@csrf
				<p class="mt-4 text-xs font-bold">Username</p>
				<input class="h-10 w-full rounded-md text-gray-600 text-sm" type="text" name="name" value="{{ old('name') }}" autocomplete="off">
				@if( $errors->first('name') )
					<p class="text-xs text-red-600 mt-1">*{{ $errors->first('name') }}</p>
				@else
					<p class="text-xs mt-1">name for your account</p>
				@endif
				<p class="mt-4 text-xs font-bold">E-mail</p>
				<input class="h-10 w-full rounded-md text-gray-600 text-sm" type="text" name="email" value="{{ old('email') }}" autocomplete="off">
				@if( $errors->first('email') )
					<p class="text-xs text-red-600 mt-1">*{{ $errors->first('email') }}</p>
				@else
					<p class="text-xs mt-1">Example : email@gmail.com</p>
				@endif
				<p class="mt-4 text-xs font-bold">Password</p>
				<input class="h-10 w-full rounded-md text-gray-600 text-sm" type="password" name="password" autocomplete="off">
				@if( $errors->first('password') )
					<p class="text-xs text-red-600 mt-1">*{{ $errors->first('password') }}</p>
				@else
					<p class="text-xs mt-1">password must have min 8 character</p>
				@endif
				<p class="mt-4 text-xs font-bold">Confirm-password</p>
				<input class="h-10 w-full rounded-md text-gray-600 text-sm" type="password" name="password_confirmation" autocomplete="off">
				@if( $errors->first('password') )
					<p class="text-xs text-red-600 mt-1">*{{ $errors->first('password') }}</p>
				@else
					<p class="text-xs mt-1">confirm your password</p>
				@endif
				<button class="mt-6 h-10 w-full rounded-md bg-blue-600 text-white flex flex-row justify-center items-center hover:opacity-80 transition" type="submit">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white" strokeWidth={2}><path strokeLinecap="round" strokeLinejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
					<p class="text-white ml-2">Register</p>
				</button>
			</form>
		</div>
	</div>
</body>
</html>