$(document).ready(function() {


	$( "#loginform" ).on( "submit", function( event ) {
		event.preventDefault();

		var usuario = $('#username').val();
		var password = $('#password').val();
		
		if(!usuario){
			$.notify.alert('Username is a required field!', { autoClose : 3000 });
			$('#username').parent().parent().addClass("error");
		}
		else{
			$('#username').parent().parent().removeClass("error");
			if(!password){
				$('#password').parent().parent().addClass("error");
				$.notify.alert('Password can not be blank!', { autoClose : 3000 });
		
			}
			else{
				$('#password').parent().parent().removeClass("error");
				var request = $.ajax({
					url: "../listeners/login.php",
					type: "POST",
					data: $("#loginform").serialize(),
					dataType: "json"
				});
			 
				request.done(function(msg) {
					if(msg.clp){
						//alert("login successfull");
						window.location.href = "../load/";
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
		}
		
		
		
	});
});