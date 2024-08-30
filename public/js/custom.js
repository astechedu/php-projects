$(function(){
	//Counter Cart Items
        
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        

	//var token = "{{ csrf_token() }}";
	$('#cartTotal').on('mouseover', function(){
		$.ajax({			
			type:'POST',
			url: "/cartitems",		
			data:{'name':'ajay'},	
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
			dataType: 'json',
			success:function(response){
				$cartCounter = response.cartCounter
				$('#cartCounter').text($cartCounter)
				console.log(response)
			},
		});
	});
})