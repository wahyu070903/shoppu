<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" href="{{asset('css/product.css')}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.6/dist/css/splide.min.css">
	<title>Product Detail</title>
</head>
<body>
	<div class="w-full h-12 flex flex-row justify-between items-center px-6 sm:px-12 bg-white fixed top-0 left-0">
        <div>
            <img src="{{asset('images/logo.png')}}" class="h-8 w-auto">
        </div>
        <div class="flex flex-row justify-end sm:justify-center items-center w-fit sm:w-4/5">
            <form method="post" action="" class="hidden sm:block w-3/5 flex flex-row relative">
                <input type="text" name="keyword" class="w-full h-8 rounded-sm bg-gray-200 border-0 outline-blue-200 pl-4 pr-14" placeholder="Search product.....">
                <button type="submit" class="h-8 w-8 absolute right-0 top-1/2 -translate-y-1/2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>    
                </button>
            </form>
            <div class="flex flex-row items-center sm:justify-between items-center sm:mx-6">
                <button class="flex flex-row items-center mx-4 sm:mx-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="hidden sm:block ml-1">Profile</p>
                </button>
                <button class="flex flex-row items-center sm:mx-6 h-8 px-2 rounded-sm bg-gradient-to-r from-cyan-500 to-blue-500">
                    <svg class="w-6 h-6" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <p class="hidden sm:block text-white ml-1">Cart</p>
                    <p class="hidden sm:block text-white ml-2">12</p>
                </button>
            </div>
        </div>
    </div>
    <!-- content section -->
    <div class="w-full h-screen flex flex-row px-12 pt-20">
        <div class="w-2/5 h-full flex flex-col items-center">
    		<div class="bg-red-600">
    			<img id="display" src="{{asset('images/product_images/'.$product->images[0])}}" class="w-80 h-80 object-cover">
    		</div>
    		<div class="w-full bg-rd-400 flex flex-row items-center justify-center mt-4">
    			<section class="small_splide splide relative justify-self-center w-full overflow" aria-label="Splide Basic HTML Example">
    				<div class="splide__track">
    					<ul class="splide__list flex flex-row items-center justify-center">
    						@foreach($product->images as $image)
    						<li class="splide__slide" onclick="changeDisplay('{{$image}}')">
				    			<div class="w-20 h-20">
				    				<img src="{{asset('images/product_images/'.$image)}}" class="w-20 h-20 object-cover">
				    			</div>
				    		</li>
    						@endforeach
				    	</ul>
				    </div>
				</section>
    		</div>
    	</div>
    	<!-- description -->
    	<div class="ml-12">
    		<h1 class="text-lg font-bold">{{$product['name']}}</h1>
    		<p class="text-gray-400 text-sm my-2">{{$product['description']}}</p>
    		<div class="flex flex-row mb-2">
    			<p class="w-fit px-1 py-1 text-xs rounded-sm text-gray-600 bg-gray-200">{{$product['sold']}} Sold</p>
    			<p class="w-fit px-1 py-1 ml-2 text-xs rounded-sm text-gray-600 bg-gray-200">{{$product['stock']}} Stock</p>
    		</div>
    		@if($product['discount'])
           		@php
                    $original_price = $product['price'];
                    $discount = $product['discount']['discount'];
                    $final_price = $original_price - ($original_price * ($discount/100));
                @endphp
            <div class="flex flex-row items-center">
                <p class="text-gray-600 text-xs line-through">IDR {{ number_format($original_price,2,'.',',') }}</p>
                <p class="text-xs ml-2 px-1 py-1 rounded-sm text-red-600 bg-red-200">{{ $product['discount']['discount'] }} %</p>
            </div>
            <p class="text-red-400">IDR {{ number_format($final_price,2,'.',',') }}</p>
            @else
            <h3>IDR {{number_format($product['price'],2,'.',',')}}</h3>  
            @endif
            <form action="#" method="post" class="mt-6">
            	<div class="flex flex-row">
            		<button type="button" onclick="decrement()" class="w-10 h-10 bg-blue-400 rounded-sm text-white">-</button>
	            	<input id="quantity" class="h-10 w-20 rounded-sm text-center mx-2" type="number" name="quantity" value="0" min="0" max="{{$product['stock']}}">
	            	<input id="stock" type="hidden" name="quantity" value="{{$product['stock']}}">
	            	<button type="button" onclick="increment()" class="w-10 h-10 bg-blue-400 rounded-sm text-white">+</button>
            	</div>
            	<button class="w-fit h-10 px-4 rounded-sm bg-red-600 text-white mt-4" type="submit">Add To Cart</button>
            </form>
    	</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.6/dist/js/splide.min.js"></script>
    <script type="text/javascript">
    	var small_splide = new Splide( '.small_splide', {
            perPage: 4,
            gap : 4,
            drag   : 'free',
            arrows:false,
            pagination:false
        });
        small_splide.mount();

        const quantity_input = document.getElementById('quantity');
        const stock = parseInt(document.getElementById('stock').value);
        function increment(){
        	if(parseInt(quantity_input.value) < stock)
        	quantity_input.value = parseInt(quantity_input.value) + 1;
        }
        function decrement(){
        	if(parseInt(quantity_input.value) > 0){
        		quantity_input.value = parseInt(quantity_input.value) - 1;
        	}
        }
        const image_display = document.getElementById("display");
        const image_path = "{{ URL::asset('/images/product_images/') }}";
        function changeDisplay(image_name){
        	image_display.setAttribute('src',image_path + '/' + image_name);
        }
    </script>
</body>
</html>