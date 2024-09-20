$(function(){
  // Fetch the stored token from localStorage and set in the header
  //headers: {"Authorization": "Bearer " + localStorage.getItem('token')}

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
				//url: "{{ route('cart.counter') }}", 
				dataType: 'json',
				success:function(response){
					$cartCounter = response.cartCounter	
					$('#cartCounter').text($cartCounter)
					//console.log(response)
				},
			});
		///});
		}


//Jquery Ajax Post Request     //Method 2
//Insert without Page : Not Working Only First product is added again and again
//productToCart()
function productToCart(){

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

	$('button#addStatButton').on('click', function(e) {
    //$('form#ajax').submit(function(e){   //Form submit    
	   e.preventDefault();
    let qty 		= $('input#qty').val()
	let description = $('input#description').val()
	let pprice 		= $('input#pprice').attr('value')
	let pname 		= $('input#pname').val()	
	let pid 		= $('input#pid').attr('value')
    let data = {qty:qty,description:description,price:pprice,name:pname,pid:pid}	

	    $.ajax({   
	        url: "http://localhost/addtocart",    
	        type: "POST",	                
	        data: data,
	        //data: $('form#ajax').serialize(),
	        dataType: "json",
	        //contentType: "application/json; charset=utf-8",
	        //cache: false,
	        success: function(data){      

	              console.log("Data Save: " + data.name);
	        },
	        error: function (xhr, status, error) {
	             console.error(xhr.responseText);
	            // Handle error response
	        }
	    }).done(function(data){
	    	//console.log(data)
	    });
    //}); //Form submit
	});
}

//Jquery Ajax Post Request
/*
$('#ajax').on('submit', function(e) {
    e.preventDefault();
    $.post( 'http://localhost/addtocart', $('#ajax').serialize(), function(data) {

       },
       'json' // I expect a JSON response
    );
});
*/

//Jquery Ajax Post Request
/*

$('#addStatButton').on('click', function(e) {
    e.preventDefault();
    $.post( 'http://localhost/addtocart', $('#ajax').serialize(), function(data) {

       },
       'json' // I expect a JSON response
    );
});
*/




//Add to Cart Without jQuery Ajax Request: Working
addToCart()           //Method 1   Page Loading
function addToCart(){
$("input#addStatButton").on('submit', function(e) {
	$("#success").fadeIn(1500);
    e.preventDefault();
/*
    let qty = $('#qty').val()
	let description = $('#description').val()
	let price = $('#pprice').val()
	let name = $('#pname').val()
	let pid = $('#pid').val()
    let data = {qty:qty,description:description,price:pprice,name:pname,pid:pid}
*/
    $.ajax({        
        //url: "{{ route('cart.addtocart') }}",   
        url: "http://localhost/addtocart",    
        type: "POST",        
        dataType: "json",
        data: $('form#ajax').serialize(),
        //data: data,
        //contentType: false,
        //cache: false,
        //processData: false,
        success: function(data){     
        	$("#success").fadeOut(4500);	  
             // alert("Data Save: " + data);
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

			$('.cartRemove').on('click', function(){
			$("#success").fadeIn(1500);
				let pid = $(this).attr('pid');
	          
				$.ajax({	
					//url: "{{ route('cart.remove') }}",
					url: "http://localhost/remove",			
					type:'DELETE',													
					data: {'pid':pid},
					dataType: 'json',
					success: function(response){
					    $('#success').html(response.success);
					    $("#success").fadeOut(1500);
						
					},				
				}).done(function(response){
						//let products = document.querySelectorAll('.product')

                        $('.product').map(function(){
                        	//$(this).attr('class')
                        	if($(this).attr('pid') == parseInt(response.pid)){
                              $(this).fadeOut(200)  
                              countCartItems()                                         
                        	}                     	
                        })		
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


/*
// ajax

$.ajax({
    url: 'YourRestEndPoint',
    headers: {
        'Authorization': `Bearer ${token}`,
    },
    method: 'POST',
    data: YourData,
    success: function(data){
      console.log('succes: '+data);
    }
  });


// axios
axios({
  method: 'post',
  url: yourEndpoint,
  data: yourData,
  headers: { 'authorization': `Bearer ${token}` }
});

*/
//
//Payment pages
//Checkout Page
$('button#checkout').on('click', function(e) {
    //e.preventDefault();
  window.location.href='payment'

});


//Register Form 
$('#registerForm').on('click', function(){
	$.ajax({
		url: 'http://localhost/register',
		type: 'GET',
		dataType: 'html',
		success: function(response){
			//$('#form-group-test').css('display','block')
			$('#tlogin').html(response)
		}
	});
	//$('.form-popup-register').css('display','block');
});


//Login Form
$('#loginForm').on('click', function(){
  	
	//$('.form-popup-test').css('display','block');	
	$.ajax({
		url: 'http://localhost/login',
		type: 'GET',
		dataType: 'html',	
		cache: false,
		contentType: false,
		processData: false,
		success: function(data){
			console.log(data);
			//$('#form-group-test').css('display','block')
			$('#tlogin').html(data)
		},
		error: function (error,jqXHR, textStatus, errorThrown) {               
			console.log(data.error);  		  
		}		
	});
});


//cache: false,
//contentType: false,
//processData: false,

})  //Ready function ends