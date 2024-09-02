$(function(){
	//Counter Cart Items        
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });        
	//var token = "{{ csrf_token() }}";	
	//Counting Cart items in Cart Bucket
	countCartItems()
		function countCartItems(){
		//$('#cartTotal').on('mouseover', function(){
			$.ajax({			
				type:'GET',
				url: 'http://localhost/cartitems',	
	            //headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
				dataType: 'json',
				success:function(response){
					$cartCounter = response.cartCounter
					$('#cartCounter').text($cartCounter)
					//console.log(response)
				},
			});
		//});
		}

//Adding Cart Items
//addToCart()
function addToCart(){
$("#ajax").on('submit', function(e) {
    e.preventDefault();

    $.ajax({        
        url: "{{ route('cart') }}",        
        type: "POST",
        dataType: "json",
        data: $('#ajax').serialize(),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
              alert("Data Save: " + data);
        },
        error: function (xhr, status, error) {
              console.error(xhr.responseText);
            // Handle error response
        }
    });
});
}

//Removing Cart Item in CartController@cartItemRemove
$("#success").hide();

	removeCart();
	function removeCart(){
			$('#cartRemove').on('click', function(){
			$("#success").show();
				let pid = $('#cartRemove').attr('pid');
	           //alert(pid);
				$.ajax({				
					type:'POST',
					url:'http://localhost/remove',				
					data: {'pid':pid},
					//_token: '{{ csrf_token() }}',
					dataType: 'json',
					success: function(response){
					    $('#success').html(response.success);
					    $("#success").fadeOut(2000);
						//console.log()
					},				
				});
			});	
	}

})