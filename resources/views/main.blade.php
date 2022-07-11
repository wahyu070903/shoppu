<!DOCTYPE html>
<html>
<head>
	<title>@yield('page_title')</title>
	<meta charset=utf-8>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	@yield('style')
</head>
<body class="font-sans">
	<header class="fixed flex flex-row justify-between items-center top-0 left-0 w-full h-20 shadow-md bg-white z-50 overflow-hidden px-4">
		<a class="block h-16" href="/">
			<img class="h-16 w-auto object-cover" src="{{ asset('images/app_images/logo.png') }}" alt="app-logo">
		</a>
		<div class="grow ml-12 flex flex-row items-center justify-end">
			<div class="relative w-full">
				<input id="search" class="h-10 w-full rounded-lg outline-gray-200 border-gray-200" type="text" name="search" autocomplete="off">
				<button id="search-btn" class="h-10 w-10 absolute right-0 top-1/2 -translate-y-1/2 rounded-r-lg bg-gray-200" type="button" >
                    <svg class="w-6 h-6 mx-auto stroke-gray-400 stroke-1" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>    
                </button>
			</div>
			<div class="flex flex-row items-center">
				<a href="profile" class="ml-12">
                    <svg class="w-6 h-6 mx-auto stroke-gray-400" fill="none"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </a>
                <a href="profile" class="ml-4">
                    <svg class="h-6 w-6 mx-auto stroke-gray-400" fill="none" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                </a>
                <a href="profile" class="ml-4">
                    <svg class="h-6 w-6 mx-auto stroke-gray-400" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </a>
                <div class="w-10 h-10 flex flex-row items-center ml-12">
                	<img class="w-10 h-10 rounded-full object-cover" src="{{ asset('images/user_profile_images/fire.gif') }}" alt="user-pic">
                </div>
			</div>
		</div>
	</header>
	<section class="z-0 px-12 mt-24">
		@yield('content')
	</section>
	<footer class="w-full grid grid-cols-4 px-12 pt-4 mt-20">
		<div>
			<h3 class="font-bold">Shoppu</h3>
			<p class="text-gray-400 text-sm mt-2">Tentang Shoppu</p>
			<p class="text-gray-400 text-sm mt-2">Blog</p>
			<p class="text-gray-400 text-sm mt-2">Mitra</p>
			<p class="text-gray-400 text-sm mt-2">Karir</p>
			<p class="text-gray-400 text-sm mt-2">moto</p>
			<p class="text-gray-400 text-sm mt-2">komitmen layanan</p>

			<h3 class="font-bold mt-4">Other</h3>
			<p class="text-gray-400 text-sm mt-2">Developer</p>
			<p class="text-gray-400 text-sm mt-2">Technology</p>
			<p class="text-gray-400 text-sm mt-2">version</p>			
		</div>
		<div>
			<h3 class="font-bold mt-4">Help & Services</h3>
			<p class="text-gray-400 text-sm mt-2">Contact</p>
			<p class="text-gray-400 text-sm mt-2">Address</p>
			<p class="text-gray-400 text-sm mt-2">Support</p>
			<p class="text-gray-400 text-sm mt-2">How to use?</p>
		</div>
		<div class="col-span-2">
			<h3 class="font-bold mt-4">Follow us On</h3>
			<div class="flex flex-row items-center mt-2">
				<a href="#">
					<img class="w-8 h-8 object-cover" src="{{ asset('images/app_images/facebook.png') }}" alt="fb">
				</a>
				<a class="ml-2" href="#">
					<img class="w-8 h-8 object-cover" src="{{ asset('images/app_images/twitter.png') }}" alt="fb">
				</a>
				<a class="ml-2" href="#">
					<img class="w-8 h-8 object-cover" src="{{ asset('images/app_images/instagram.png') }}" alt="fb">
				</a>
			</div>
			<img class="mx-auto mt-20" src="{{ asset('images/app_images/logo.png') }}" alt="icon">
		</div>
	</footer>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
	@yield('script')
</body>
</html>