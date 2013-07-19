$(document).ready(function() {


	$( "#newdress" ).on( "submit", function( event ) {
		event.preventDefault();
		console.log("clikeando");
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		var institution = $('#institution').val();
		
		if(!firstname){
			$('#firstname').parent().parent().addClass("error");
			$.notify.alert('First name can not be blank!', { autoClose : 3000 });
		}
		else{
			$('#firstname').parent().parent().removeClass("error");
			if(!lastname){
				$('#lastname').parent().parent().addClass("error");
				$.notify.alert('Last name can not be blank!', { autoClose : 3000 });
		
			}
			else{
				$('#lastname').parent().parent().removeClass("error");
				if(!institution){
					$('#institution').parent().parent().addClass("error");
					$.notify.alert('Last name can not be blank!', { autoClose : 3000 });
					}
				else{
				$('#institution').parent().parent().removeClass("error");
				var request = $.ajax({
					url: "../listeners/changeprofile.php",
					type: "POST",
					data: $("#newdress").serialize(),
					dataType: "json"
				});
			 
				request.done(function(msg) {
					if(msg.clp){
						//alert("login successfull");
						$('#neonombre').text(firstname);
						$('#neolast').text(lastname);
						$('#neoinst').text(institution);
						$('#myModal2').foundation('reveal', 'close');
						$.notify.success("Changes saved successfuly.", { autoClose : 3500 });
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
		
		
		
	});
});