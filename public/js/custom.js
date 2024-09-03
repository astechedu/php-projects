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
				url: "http://localhost/cartitems", 
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
$("#ajax").on('click', function(e) {
    e.preventDefault();

    let qty = $('#qty').val()
	let description = $('#description').val()
	let pprice = $('#pprice').val()
	let pname = $('#pname').val()
    let data = {qty:qty,description:description,price:pprice,name:pname}

    $.ajax({        
        url: "{{ route('cart.addtocart') }}",        
        type: "POST",        
        dataType: "json",
        //data: $('#ajax').serialize(),
        data: data,
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
			$("#success").fadeIn(1500);
				let pid = $('#cartRemove').attr('pid');
	          
				$.ajax({	
					//url: "{{ route('cart.remove') }}",
					url: "http://localhost/remove",			
					type:'DELETE',													
					data: {'pid':pid},
					dataType: 'json',
					success: function(response){
					    $('#success').html(response.success);
					    $("#success").fadeOut(1500);
						//console.log()
					},				
				});
			});	
	}


//Practice
	//practice()
		function practice(){
		//$('#cartTotal').on('mouseover', function(){
			$.ajax({			
				type:'GET',
				url: "#",   
	            dataType: 'html',
				success:function(response){
					//console.log(response)
				},
			});
		//});
		}


})