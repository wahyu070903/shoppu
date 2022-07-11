<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>{{ $user->name }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div class="w-4/5 rounded-lg shadow-lg flex flex-col justify-center items-center absolute left-1/2 -translate-x-1/2 mt-12">
		<div class="w-full my-4 flex flex-row justify-around items-center">
			<button class="nav-menu text-lg text-gray-400 hightlight" onclick="changeView('personal')">Personal Data</button>
			<button class="nav-menu text-lg text-gray-400" onclick="changeView('address')">Address list</button>
			<button class="nav-menu text-lg text-gray-400" onclick="changeView('account')">Account</button>
			<button class="nav-menu text-lg text-gray-400" onclick="changeView('personal')">Other</button>
		</div>
		<div id="dynamic-element" class="w-full">
			{{ view('user.personal')->with('user',$user) }}
		</div>
	</div>
</body>
</html>

<style>
	.hightlight{
		border-bottom: 2px solid blue;
	}	
</style>

<script src="{{ asset('js/app.js') }}"></script>
<script>
	$('.nav-menu').click(function(){
		$('.nav-menu').each(function(index,element){
			element.classList.remove('hightlight')
		})
		$(this).addClass('hightlight')
	})

	function changeView(target){
		$.ajax({
			url : 'profile/' + target,
			method : 'get',
			success : function(result){
				$('#dynamic-element').html(result)
			}
		})
	}
</script>