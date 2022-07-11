@extends('../main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/product.css') }}">
@endsection
@section('content')
    <div class="flex flex-row items-center w-full">
        <div class="self-start flex flex-col items-center w-1/4 overflow-hidden">
            <div class="image-box overflow-hidden">
                <img class="preview-img w-72 h-72 object-cover" src="{{ asset('images/product_images/'. $product->images[0]) }}" alt="product-pic">
            </div>
            <div class="swiper w-full overflow-hidden mt-6">
                <div class="swiper-wrapper">
                    @foreach($product->images as $image)
                    <div class="swiper-slide !w-20 h-20 shadow-md rounded-md mx-2 border-2 border-blue-500" data-image="{{ $image }}">
                        <img class="w-20 h-20 object-cover rounded-md" src="{{asset('images/product_images/'. $image)}}" alt="prod-pic">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex flex-col w-2/4 self-start px-10">
            <p class="text-lg font-bold">{{ $product['name'] }}</p>
            <div class="flex flex-row justify-between items-center mb-4">
                <p class="text-xs text-gray-400">Sold : {{ $product['sold'] }}</p>
            </div>
            @if($product['discount'])
                @php
                    $original_price = $product['price'];
                    $discount = $product['discount']['discount'];
                    $final_price = $original_price - ($original_price * ($discount/100));
                @endphp
                <input type="hidden" name="price" value={{ $final_price }}>
                <input type="hidden" name="original-price" value={{ $original_price }}>
                <div class="flex flex-row items-center">
                    <p class="text-gray-600 text-xs line-through">IDR {{ number_format($original_price,2,'.',',') }}</p>
                    <p class="text-xs ml-2 px-1 py-1 rounded-sm text-red-600 bg-red-200">{{ $product['discount']['discount'] }} %</p>
                </div>
                <p class="font-bold text-2xl">IDR {{ number_format($final_price,2,'.',',') }}</p>
            @else
                <input type="hidden" name="price" value={{ $product['price'] }}>
                <h3 class="font-bold text-2xl">IDR {{number_format($product['price'],2,'.',',')}}</h3>  
            @endif
            <p class="text-sm text-gray-400 mt-2">{{ $product['description'] }}</p>
        </div>
        <div class="checkout-card w-1/4 self-start">
            <div class="w-full h-full mx-6 my-6 px-4 py-4 rounded-md shadow-md">
                <div class="flex flex-row">
                    <div class="relative w-40">
                        <button class="btn-decrease w-10 h-10 absolute top-1/2 left-0 -translate-y-1/2" type="button">
                            <svg class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" ><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>
                        </button>
                        <input type="hidden" name="stock" value={{ $product['stock'] }}>
                        <input class="w-full h-10 rounded-md px-10 text-center" type="number" name="quantity" value=1>
                        <button class="btn-increase w-10 h-10 absolute top-1/2 right-0 -translate-y-1/2" type="button">
                            <svg class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" ><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                        </button>
                    </div>
                    <p class="ml-2 font-bold self-center text-sm">Stock : <span class="text-gray-400">{{ $product['stock'] }}</span></p>
                </div>
                <div class="flex flex-row mt-4 items-center justify-between w-full">
                    <p class="text-gray-400 text-sm">Subtotal : </p>
                    @if($product['discount'])
                        <div class="flex flex-col">
                            <p class="original-price text-gray-600 text-xs line-through">IDR <span>{{ number_format($original_price,2,'.',',') }}</span></p>
                            <p class="subtotal font-bold text-xl">IDR <span>{{ number_format($final_price,2,'.',',') }}</span></p>    
                        </div>
                    @endif
                </div>
                <div class="w-full mt-4">
                    <button class="w-full h-10 rounded-md bg-blue-500 flex flex-row justify-center items-center" type="button">
                        <svg class="h-6 w-6 stroke-white" fill="none" viewBox="0 0 24 24"xmlns="http://www.w3.org/2000/svg"  stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        <p class="text-white">Add to cart</p>
                    </button>
                </div>
            </div>
        </div>  
    </div>
@endsection

@section('script')
    <script>
        const image_box = $('.image-box')
        const img = $('.image-box .preview-img')
        image_box.mouseenter((e)=>{
            activeZoom(e)
        })    
        image_box.mousemove((e)=>{
            activeZoom(e)
        })
        image_box.mouseout(()=>{
            disableZoom()
        })

        function activeZoom(e){
            const x = e.clientX - e.target.offsetLeft
            const y = e.clientY - e.target.offsetTop
            img.css('transformOrigin', `${x}px ${y}px`)
            img.css('transform', 'scale(2)')
        }
        function disableZoom(){
            img.css('transformOrigin','center center')
            img.css('transform','scale(1)')
        }

        $(".btn-increase").click(function(){
            const input = $("input[name='quantity']")
            const stock = $("input[name='stock']").val()

            if( parseInt(input.val()) < stock){
                input.val(parseInt(input.val()) + 1)
                calcTotal()
            }
        })

        $(".btn-decrease").click(function(){
            const input = $("input[name='quantity']")

            if( parseInt(input.val()) > 0){
                input.val(parseInt(input.val()) - 1)
                calcTotal()
            }
        })

        $("input[name='quantity']").change(function(){
            const input = $("input[name='quantity']")
            const stock = $("input[name='stock']").val()
            if( (parseInt(input.val()) < 0) | (parseInt(input.val()) > stock)){
                input.val(1)
                calcTotal()
            }
        })

        function calcTotal(){
            const price = parseInt($("input[name='price']").val())
            const quantity = parseInt($("input[name='quantity']").val())
            const total = $(".subtotal span")
            const options = { 
                minimumFractionDigits: 2,
                maximumFractionDigits: 2 
            };

            let formater = Number(price * quantity).toLocaleString('en', options)
            total.text(formater)

            if($("input[name='original-price']")){
                const original_price = parseInt($("input[name='original-price']").val())
                const quantity = parseInt($("input[name='quantity']").val())
                const wraper = $('.checkout-card .original-price span')
                const options = { 
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2 
                };
                let formater = Number(original_price * quantity).toLocaleString('en', options)
                wraper.text(formater)
            }
        }

        const swiper = new Swiper('.swiper', {
          direction: 'horizontal',
          loop: false,
          slidesPerView : 'auto',
          width : null
        });

        //change image-box preview
        $('.swiper-slide').click(function(){
            const filename = $(this).attr('data-image')
            const path = '/images/product_images/'
            $('.preview-img').attr('src',path + filename)
        })
    </script>
@endsection