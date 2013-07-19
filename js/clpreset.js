$(document).ready(function() {

	$( "#reseter" ).on( "submit", function( event ) {
		event.preventDefault();
		
		var usuario = $('#username').val();
		
		if(!usuario){
			$.notify.alert('Please provide a valid email!', { autoClose : 3000 });
			$('#username').parent().parent().addClass("error");
		}
		else{
			$('#username').parent().parent().removeClass("error");
				var request = $.ajax({
					url: "../listeners/reset.php",
					type: "POST",
					data: $("#reseter").serialize(),
					dataType: "json"
				});
			 
				request.done(function(msg) {
					if(msg.clp){
						//alert("login successfull");
						window.location.href = "../login/";
					}
					else{
						$.notify.error(msg.msm, { autoClose : 5500 });
						//alert(msg.msm);
					}
					
				});
			 
				request.fail(function(jqXHR, textStatus, msg) {
					alert( "Request failed: " + textStatus );
					console.log(msg);
				});  
			
		}
		
		
		
	});
});