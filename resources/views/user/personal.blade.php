<div class="w-full flex flex-row my-12 mx-6">
	<div class="w-2/5 flex flex-col justify-center items-center justify-self-center self-center">
		<img class="w-60 h-60 object-cover" src="{{ asset('images/user_profile_images/fire.gif') }}" alt="profile-pic">
	</div>
	<div class="ml-4 w-3/5 justify-self-start">
		<div class="flex flex-col mt-4">
			<p class="text-gray-400 text-xs">username</p>
			<div class="data-row flex flex-row">
				<input id="user-id" type="hidden" name="user-id" value={{ $user->id }}>
				<input id="user-name" class="h-10 w-40 rounded-md" type="text" name="name" value="{{ $user->name }}" disabled="true">
				<div class="action-btn flex flex-row items-center">
					<button type="button" class="edit-btn ml-2 h-10 w-10 flex flex-row justify-center items-center bg-blue-600 rounded-md">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
					</button>
					<div class="hidden modifier-btn flex flex-row">
						<button type="button" class="confirm-btn ml-2 h-10 w-10 flex flex-row justify-center items-center bg-green-600 rounded-md">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
						</button>
						<button type="button" class="cancel-btn ml-2 h-10 w-10 flex flex-row justify-center items-center bg-red-600 rounded-md">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="w-40 flex flex-col mt-4">
			<p class="text-gray-400 text-xs">e-mail address</p>
			<div class="flex flex-row">
				<input class="h-10 w-40 rounded-md" type="text" name="name" value="{{ $user->email }}" disabled="true">
			</div>
		</div>
		<div class="w-40 flex flex-col mt-4">
			<p class="text-gray-400 text-xs">phone number</p>
			<div class="data-row flex flex-row">
				<input id="user-phone" class="h-10 w-40 rounded-md" type="text" name="phone" value="{{ $user->phone }}" disabled="true">
				<div class="action-btn flex flex-row items-center">
					<button type="button" class="edit-btn ml-2 h-10 w-10 flex flex-row justify-center items-center bg-blue-600 rounded-md">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
					</button>
					<div class="hidden modifier-btn flex flex-row">
						<button type="button" class="confirm-btn ml-2 h-10 w-10 flex flex-row justify-center items-center bg-green-600 rounded-md" onclick="editPhone()">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
						</button>
						<button type="button" class="cancel-btn ml-2 h-10 w-10 flex flex-row justify-center items-center bg-red-600 rounded-md">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
	$('.edit-btn').click(function(){
		const modifier_btn = $(this).closest('.action-btn').find('.modifier-btn')
		const input_field = $(this).closest('.data-row').find('input')

		$(this).addClass('hidden')
		modifier_btn.removeClass('hidden')
		input_field.prop('disabled',false)
	})
	$('.cancel-btn').click(function(){
		const edit_btn = $(this).closest('.action-btn').find('.edit-btn')
		const input_field = $(this).closest('.data-row').find('input')

		edit_btn.removeClass('hidden')
		$(this).parent().addClass('hidden')
		input_field.prop('disabled',true)		
	})
	function hideModifier(){
		$(".modifier-btn").each(function(index, element){
	    	element.classList.add('hidden')
	    })
	    $(".edit-btn").each(function(index,element){
	    	element.classList.remove('hidden')
	    })
	    $("input").each(function(index,element){
	    	element.setAttribute('disabled', true)
	    })	
	}
	function editProfile(){
		const user_id = $("#user-id").val()
		const data = {
			'id' : user_id,
			'name' : $('#user-name').val(),
			'phone' : $('#user-name').val()
		}
		$.ajax({
			url : 'profile/update',
			method : 'post',
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
    		success : function(response){
    			console.log(response)
    			hideModifier()
    		},
    		error : function(e){
    			console.log(e)
    			hideModifier()
    		}
		})
	}
	function editPhone(){
		const name = $("#user-name").val()
		const user_id = $("#user-id").val()
		const data = {
			'id' : user_id,
			'name' : name
		}
		$.ajax({
			url : 'profile/edit-name',
			method : 'post',
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
    		success : function(respond){
    			$("#user-name").closest('.data-row').find(".modifier-btn").addClass('hidden')
				$("#user-name").closest('.data-row').find(".edit-btn").removeClass('hidden')
    		},
    		error : function(e){
    			$("#user-name").closest('.data-row').find(".modifier-btn").addClass('hidden')
				$("#user-name").closest('.data-row').find(".edit-btn").removeClass('hidden')
    		}
		})
	}
</script>