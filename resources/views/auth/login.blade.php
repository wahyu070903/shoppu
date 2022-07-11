<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset=utf-8>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="absolute top-1/2 -translate-x-1/2 -translate-y-1/2 left-1/2 w-[800px] h-[500px] px-12 py-12 rounded-md bg-white opacity-80 z-0">
		<img src="{{ asset('images/app_images/login-bg.png') }}" class="w-[800px] h-[500px] object-cover">
	</div>
	<div id="login-card" class="absolute top-1/2 -translate-x-1/2 -translate-y-1/2 left-1/2 w-96 h-4/5 px-12 py-12 rounded-md bg-white drop-shadow-lg overflow-hidden z-10">
		<div class="flex flex-col items-center">
			<div class="header-slide w-full flex flex-row justify-between items-center">
				<h1 class="text-xl font-bold">Login</h1>
				<a href="register" class="text-xs text-blue-600">don't have account?</a>
			</div>
			<div class="header-slide w-full flex flex-row justify-between items-center">
				<button type="button" class="h-6 w-6" onclick="slideBack()">
					<svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="gray" strokeWidth={2}><path strokeLinecap="round" strokeLinejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" /></svg>
				</button>
				<a href="#" class="text-xs text-blue-600 self-center">don't have account?</a>
			</div>
			<img class="w-24 h-24 object-cover mt-8" src="{{ asset('images/app_images/logo-icon.png') }}">
			<form method="post" action="login" class="w-full flex flex-row mt-8">
				@csrf
				<div class="login-slide active w-full flex flex-col">
					<p class="text-sm text-gray font-bold mb-1">E-mail</p>
					<input type="text" name="email" value="{{ old('email') }}" class="w-full h-10 rounded-md outline-none text-sm text-gray-600" autocomplete="off">
					@if( $errors->first('email') )
						<p class="text-xs text-red-400 mt-1">*{{ $errors->first('email')}}</p>
					@else
						<p class="text-xs text-gray-400 mt-1">Example : example@gmail.com</p>
					@endif
					<p class="text-xs self-end mt-4 text-blue-600">Need help?</p>
					<button type="button" class="w-full h-10 rounded-md mt-1 bg-blue-600 text-white" onclick="slideNext()">Next</button>
				</div>
				<div class="login-slide w-full flex flex-col">
					<p class="text-sm text-gray font-bold mb-1">Password</p>
					<div class="relative">
						<input id="password" type="password" name="password" class="w-full h-10 rounded-md outline-none pr-12 text-sm text-gray-600" autocomplete="off">
						<svg id="hide-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-1/2 right-4 -translate-y-1/2 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="gray" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
						<svg id="show-icon" xmlns="http://www.w3.org/2000/svg" class="hidden h-6 w-6 absolute top-1/2 right-4 -translate-y-1/2 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="gray" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>	
					</div>
					@if( $errors->first('password') )
						<p class="text-xs text-red-400 mt-1">*{{$errors->first('password')}}</p>
					@else
						<p class="text-xs text-gray-400 mt-1">Example : password12345</p>
					@endif
					<p class="text-xs self-end mt-4 text-blue-600">Need help?</p>
					<button type="submit" class="w-full h-10 rounded-md mt-1 bg-blue-600 text-white">Submit</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>

<style>
	.login-slide { display: none; }
	.header-slide{ display: none; }
	.slide-animate{
		animation: slide 0.5s linear forwards;
	}
	@keyframes slide{
		0%{
			transform: translateX(500px);

		}100%{
			transform: translateX(0px);
		}
	}
</style>
<script src="{{ asset('js/app.js') }}"></script>
<script>
	let current_slide = 0
	show_slide()

	function slideNext(){
		current_slide += 1
		show_slide()
	}
	function slideBack(){
		current_slide -= 1
		show_slide()
	}
	function show_slide(){
		const slide = $(".login-slide")
		const header = $(".header-slide")
		slide.each(function(index, element) {
			if(index == current_slide){
				element.style.display = 'block'
				header[index].style.display = 'flex'
				element.classList.add('slide-animate')
			}else{
				element.style.display = 'none'
				header[index].style.display = 'none'
			}
		});
	}

	$("#hide-icon").click(function(){
		togglePassword()
	})
	$("#show-icon").click(function(){
		togglePassword()
	})
	function togglePassword(){
		const password = $("#password")[0]
		if(password.type == 'password'){
			password.type = 'text'
			$("#hide-icon").hide()
			$("#show-icon").show()
		}else{
			password.type = 'password'
			$("#show-icon").hide()
			$("#hide-icon").show()
		}
	}
</script>