	$(document).ready(function(){
		$(".chooser").on('click',function(){
			$(".chooser").removeClass('success');
			$(".chooser").text('Select');
			$(".celeste").removeClass('regordo');
			$(this).addClass('success');
			$(this).text('Selected');
			$(this).closest(".celeste").toggleClass('regordo');
			console.log("yeah!");
		});
		
		$("#addsites").on('click',function(){
			$("#remsites").removeClass('aparece');
			 var num = $('.clonedInput').length;
			var newNum	= num + 1;		
			var newElem = $('#siter' + num ).clone().attr('id', 'siter' + newNum);
			newElem.find('.labela').attr('for', 'site' + newNum ).text('Site ' + newNum );
			newElem.find('#site' + num ).attr('id','site' + newNum );
			$('#siter' + num).after(newElem);

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
        $('#siter' + num ).remove();
        
        // enable the "add" button, since we've removed one				
        $('#addsites').removeAttr('disabled');	
        $('#addsites').removeClass('disabled');
        
        // if only one element remains, disable the "remove" button
        if ( num-1 == 1 )
        $('#remsites' ).addClass('aparece');
 
    });
	});