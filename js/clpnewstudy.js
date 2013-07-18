	$(document).ready(function(){
	var studytype=false;
		$(".chooser").on('click',function(){
			$(".chooser").removeClass('success');
			$(".chooser").text('Select');
			$(".celeste").removeClass('regordo');
			$(this).addClass('success');
			$(this).text('Selected');
			$(this).closest(".celeste").toggleClass('regordo');
			studytype=$(this).data("tipo");
			$('#studytip').val(studytype);
			//console.log(studytype);
		});
		
		$("#addsites").on('click',function(){
			$("#remsites").removeClass('aparece');
			 var num = $('.clonedInput').length;
			var newNum	= num + 1;		
			var newElem = $('#siter' + num ).clone().attr('id', 'siter' + newNum);
			newElem.find('.labela').attr('for', 'site' + newNum ).text('Site ' + newNum );
			newElem.find('.labela2').attr('for', 'timezone' + newNum ).text('Timezone ' + newNum );
			newElem.find('#site' + num ).attr('id','site' + newNum );
			newElem.find('#timezone' + num ).attr('id','timezone' + newNum );
			newElem.find('#site' + newNum ).val('');
			$(newElem).insertAfter('#siter' + num).hide().slideDown();

			 if (newNum == 6) {
             $('#addsites').addClass('disabled');
			 $('#addsites' ).attr('disabled', 'disabled');
             console.log('maximum fields reached');
        }   
		});
		
		
		
 
    $( '#remsites' ).click( function() {
        // how many "duplicatable" input fields we currently have           
        var num = $( '.clonedInput' ).length;	
        
        // remove the last element	
        $('#siter' + num ).slideUp('400', function(){
		$('#siter' + num ).remove();
		});
		
        
        // enable the "add" button, since we've removed one				
        $('#addsites').removeAttr('disabled');	
        $('#addsites').removeClass('disabled');
        
        // if only one element remains, disable the "remove" button
        if ( num-1 == 1 )
        $('#remsites' ).addClass('aparece');
 
    });
	
		$( "#newcreater" ).on( "submit", function( event ) {
		event.preventDefault();
				console.log($("#newcreater").serialize());
		var studyname = $('#studyname').val();
		var goal = $('#goal').val();
		var site1 = $('#site1').val();
		var timezone1 = $('#timezone1').val();
		
		
		if(!studyname){
			$.notify.alert('Please provide a name for the study.', { autoClose : 3000 });
			$('#studyname').parent().parent().addClass("error");
		}
		else{
			$('#studyname').parent().parent().removeClass("error");
			if(!goal){
				$('#goal').parent().parent().addClass("error");
				$.notify.alert('Please provide a short description of the study aim.', { autoClose : 3000 });
		
			}
			else{
				$('#goal').parent().parent().removeClass("error");
				if(!site1){
					$('#site1').parent().parent().addClass("error");
					$.notify.alert('You need to specify at least one site.', { autoClose : 3000 });
				}
				else{
					$('#site1').parent().parent().removeClass("error");
					if(!timezone1){
						$('#timezone1').parent().parent().addClass("error");
						$.notify.alert('You need to specify the timezone of the site.', { autoClose : 3000 });
					}
					else{
						$('#timezone1').parent().parent().removeClass("error");
						if(!studytype){
							$.notify.alert('Please select a type of study.', { autoClose : 3000 });
						}						
						else{
							var request = $.ajax({
					url: "../listeners/neostudy.php",
					type: "POST",
					data: $("#newcreater").serialize(),
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
		}
		
		
		
	});
	
	
	
	
	
	});