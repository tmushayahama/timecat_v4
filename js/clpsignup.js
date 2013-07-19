$(document).ready(function() {


	$( "#signuper" ).on( "submit", function( event ) {
		event.preventDefault();

		var username = $('#username').val();
		var password = $('#password').val();
		var password2 = $('#password2').val();
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		var institution = $('#institution').val();
		function isValidEmailAddress(emailAddress) {
			var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
			return pattern.test(emailAddress);
		};
		
		if(!username){
			$.notify.alert('Username is a required field!', { autoClose : 3000 });
			$('#username').parent().parent().addClass("error");
		}
		else{
			$('#username').parent().parent().removeClass("error");
			if( !isValidEmailAddress( username ) ) {
				$.notify.alert('Please use a valid email address!', { autoClose : 3000 });
				$('#username').parent().parent().addClass("error");
			}
			else{
				$('#username').parent().parent().removeClass("error");	
				if(!password){
					$('#password').parent().parent().addClass("error");
					$.notify.alert('Password is a required field!', { autoClose : 3000 });
				}
				else{
					$('#password').parent().parent().removeClass("error");
					if(password2!=password){
						$.notify.alert('Passwords do not match...', { autoClose : 3000 });
						$('#password2').parent().parent().addClass("error");
					}
					else{
						$('#password2').parent().parent().removeClass("error");
						if(!firstname){
							$('#firstname').parent().parent().addClass("error");
							$.notify.alert('First name is a required field!', { autoClose : 3000 });
						}
						else{
							$('#firstname').parent().parent().removeClass("error");
							if(!lastname){
								$('#lastname').parent().parent().addClass("error");
								$.notify.alert('Last name is a required field!', { autoClose : 3000 });
							}
							else{
								$('#lastname').parent().parent().removeClass("error");
								if(!institution){
									$('#institution').parent().parent().addClass("error");
									$.notify.alert('Institution is a required field!', { autoClose : 3000 });
								}
								else{
									$('#institution').parent().parent().removeClass("error");
									if(!$('#checkbox1').is(':checked')){
										$('#checkbox1').parent().parent().addClass("error");
										$.notify.alert('You must accept the terms of agreement!', { autoClose : 3000 });
									}
									else{
										$('#checkbox1').parent().parent().removeClass("error");
										var request = $.ajax({
											url: "../listeners/signup.php",
											type: "POST",
											data: $("#signuper").serialize(),
											dataType: "json"
										});
							 
										request.done(function(msg) {
											if(msg.clp){
												window.location.href = "../login/";
											}
											else{
												$.notify.error(msg.msm, { close : true });
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
					}
				}
			}
		}
		
		
		
	
			
		
			
			
		
		
		
		
	});
});