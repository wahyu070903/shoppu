@extends('../main')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.6/dist/css/splide.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')

    <div class="banner w-full h-72 rounded-lg relative overflow-hidden">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="{{asset('images/banner/banner-1.png')}}" class="w-full h-72 object-cover">
        </div>
        <div class="swiper-slide">
            <img src="{{asset('images/banner/banner-2.png')}}" class="w-full h-72 object-cover">
        </div>
        <div class="swiper-slide">
            <img src="{{asset('images/banner/banner-3.png')}}" class="w-full h-72 object-cover">
        </div>
      </div>
      <div class="swiper-pagination flex flex-row justify-start items-center pl-4"></div>
      <div class="swiper-scrollbar absolute top-0 left-0 z-10"></div>
    </div>

    <div class="mt-12 flex flex-col border-t border-b border-gray-200">
        <p class="mb-4 mt-2 font-bold text-2xl text-gray-800">New Product</p>
        <div class="flex flex-row items-center mb-6">
            <div class="w-80 h-96">
                <img class="w-80 h-96 objecct-cover rounded-xl" src="{{ asset('images/app_images/new_products.png') }}" alt="">
            </div>
            <div class="swiper w-3/5 h-fit relative overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach($latest_products as $item)
                        @if($item['discount'])
                            @php
                                $original_price = $item['price'];
                                $discount = $item['discount']['discount'];
                                $final_price = $original_price - ($original_price * ($discount/100));
                            @endphp        
                        @endif
                    <div class="swiper-slide w-fit">
                        <a class="card block w-48 h-80 bg-white rounded-md shadow-md my-2 ml-6" href="product/{{$item['id']}}">
                            <img src="{{asset('images/product_images/'.$item->images[0])}}" class="w-full h-3/5 object-cover rounded-t-md">
                            <div class="px-2 h-2/5 flex flex-col mt-2">
                                <p class="w-full h-1/3 text-sm text-ellipsis overflow-hidden">{{ $item['name'] }} lorem ipsum dolor lorem ipsum dolor lorem ipsum lorem ipsum</p>
                                @if($item['discount'])
                                <div class="flex flex-row items-center">
                                    <p class="text-gray-600 text-xs line-through">IDR {{ number_format($original_price,2,'.',',') }}</p>
                                    <p class="text-xs ml-2 px-1 py-1 rounded-sm text-red-600 bg-red-200">{{ $item['discount']['discount'] }} %</p>
                                </div>
                                <p class="font-bold text-sm">IDR {{ number_format($final_price,2,'.',',') }}</p>
                                <p class="text-xs text-gray-800">{{ $item['sold'] }} sold</p>
                                @else
                                <p class="font-bold text-sm">IDR {{ number_format($item['price'],2,'.',',') }}</p>
                                <p class="text-xs text-gray-800">{{ $item['sold'] }} sold</p>
                                @endif
                            </div>
                        </a>
                    </div>
                    @endforeach 
                </div>
                <div class="btn-prev w-8 h-8 bg-gray-200 rounded-full flex justify-center items-center absolute top-1/2 left-2 -translate-y-1/2 z-10 transition hover:scale-125">
                    <svg class="h-5 w-5 fill-gray-400 transition hover:scale-125" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                </div>
                <div class="btn-next w-8 h-8 bg-gray-200 rounded-full flex justify-center items-center absolute top-1/2 right-2 -translate-y-1/2 z-10 transition hover:scale-125">
                   <svg class="h-5 w-5 fill-gray-400 transition hover:scale-125" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" ><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                </div>
            </div>
        </div> 
    </div>
    <div class="flex flex-col mt-6 border-b dorder-gray-200 pb-6">
        <p class="font-bold text-2xl text-gray-800">Recomendation</p>
        <div class="grid grid-cols-5 mt-4">
            @foreach($recomended as $item)
                @if($item['discount'])
                    @php
                        $original_price = $item['price'];
                        $discount = $item['discount']['discount'];
                        $final_price = $original_price - ($original_price * ($discount/100));
                    @endphp        
                @endif
                <a class="card block w-48 h-80 bg-white rounded-md shadow-md my-2 ml-6" href="product/{{$item['id']}}">
                    <img src="{{asset('images/product_images/'.$item->images[0])}}" class="w-full h-3/5 object-cover rounded-t-md">
                    <div class="px-2 h-2/5 flex flex-col mt-2">
                        <p class="w-full h-1/3 text-sm text-ellipsis overflow-hidden">{{ $item['name'] }} lorem ipsum dolor lorem ipsum dolor lorem ipsum lorem ipsum</p>
                        @if($item['discount'])
                            <div class="flex flex-row items-center">
                                <p class="text-gray-600 text-xs line-through">IDR {{ number_format($original_price,2,'.',',') }}</p>
                                <p class="text-xs ml-2 px-1 py-1 rounded-sm text-red-600 bg-red-200">{{ $item['discount']['discount'] }} %</p>
                            </div>
                            <p class="font-bold text-sm">IDR {{ number_format($final_price,2,'.',',') }}</p>
                            <p class="text-xs text-gray-800">{{ $item['sold'] }} sold</p>
                        @else
                            <p class="font-bold text-sm">IDR {{ number_format($item['price'],2,'.',',') }}</p>
                            <p class="text-xs text-gray-800">{{ $item['sold'] }} sold</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
        <div class="w-full mt-6">
            <button class="block text-gray-100 bg-blue-500 px-2 py-1 rounded-sm mx-auto" type="button">SHOW MORE</button>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        const banner = new Swiper('.banner', {
          direction: 'horizontal',
          autoplay : {
            delay : 2000,
            disableOnInteraction : false
          },
          loop: true,

          pagination: {
            el: '.swiper-pagination',
          },
          scrollbar: {
            el: '.swiper-scrollbar',
            draggable : false
          },

        });

        const swiper = new Swiper('.swiper',{
            direction : 'horizontal',
            loop : false,
            slidesPerView : 3,
            navigation: {
                nextEl: '.btn-next',
                prevEl: '.btn-prev',
            },
        });
    </script>
@endsection