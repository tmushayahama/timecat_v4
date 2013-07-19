$(document).ready(function() {


	$( "#changepass" ).on( "submit", function( event ) {
		event.preventDefault();

		var username = $('#username').val();
		var neopassowrd = $('#neopassowrd').val();
		var neopassowrd2 = $('#neopassowrd2').val();
		
		if(!username){
			$.notify.alert('Username is a required field!', { autoClose : 3000 });
			$('#username').parent().parent().addClass("error");
		}
		else{
			$('#username').parent().parent().removeClass("error");
			if(!neopassowrd){
				$('#neopassowrd').parent().parent().addClass("error");
				$.notify.alert('Password can not be blank!', { autoClose : 3000 });
		
			}
			else{
				$('#neopassowrd').parent().parent().removeClass("error");
				if(!neopassowrd2){
					$('#neopassowrd2').parent().parent().addClass("error");
					$.notify.alert('Re type your password to check for typos!', { autoClose : 3000 });
				}
				else{
					$('#neopassowrd2').parent().parent().addClass("error");
					if(neopassowrd!=neopassowrd2){
						$('#neopassowrd2').parent().parent().removeClass("error");
						$.notify.alert('Passwords do not match!', { autoClose : 3000 });
					}
					else{
						$('#neopassowrd2').parent().parent().removeClass("error");
						var request = $.ajax({
							url: "../listeners/cpass.php",
							type: "POST",
							data: $("#changepass").serialize(),
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
				
				
			}
		}
		
		
		
	});
});