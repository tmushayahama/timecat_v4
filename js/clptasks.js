$(document).ready(function() {
     $('.editers').click(function(e) {
          e.preventDefault();
		 var ledimension = $(this).closest(".section").attr('id');
		 var ledimension2 = ledimension.substr(ledimension.length - 1);
		 $("#taskdimen").val(ledimension2);
		  var taskname =$(this).closest(".sear").find('.vnam').html().trim();
		  $("#taskname").val(taskname);
		  $("#tknameti").text(taskname);
		  var taskid =$(this).closest(".sear").find('.tkid').data("tkid");
		   $("#letaksid").val(taskid);
		  var defintion =$(this).closest(".sear").find('.vdef').html().trim();
		 $("#definit").val(defintion);
		  var tstarts =$(this).closest(".sear").find('.vstars').html().trim();
		  $("#tstarts").val(tstarts);
		  var tends =$(this).closest(".sear").find('.vends').html().trim();
		  $("#tends").val(tends);
		  var acstats =$(this).closest(".sear").find('.label').html().trim();
		  $('#active').prop('checked',false);
		  $('#inactive').prop('checked',false);
		  $('#' + acstats).prop('checked',true);
		  $('#editTask').foundation('reveal', 'open');
     });
	 	$( ".updadimen" ).on( "submit", function( event ) {
		event.preventDefault();
	 var lebuton =$(this).find('.dimnamchan');
	 var currrname =$(this).find('.dimeninput').val();
	 var curdimen = $(this).find('.dimenx').val();
	 	
	 if($(this).find('.dimeninput').hasClass('aparece')){
		lebuton.val("Save");
		lebuton.addClass("success");
		 lebuton.prev().removeClass("aparece");
		 lebuton.next().removeClass("aparece");
		lebuton.prev().prev().toggle(); 
	 }
	 else{
	 
			var request = $.ajax({
				url: "../listeners/tasks.php",
				type: "POST",
				data: $(this).serialize(),
				dataType: "json"
			});
				 
			request.done(function(msg) {
				if(msg.clp){
					$('#panel'+curdimen).find('a').first().text(currrname);
					$('.section-container').foundation('section', 'reflow');
					
					lebuton.val("Change name");
					lebuton.removeClass("success");
					lebuton.prev().addClass("aparece");
					lebuton.next().addClass("aparece");
					lebuton.prev().prev().toggle(); 
					lebuton.prev().prev().text(currrname);
				
					$('#taskdimension option[value="' + curdimen + '"]').text(currrname);
					$.notify.success("Dimension name changed", { autoClose : 3500 });
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
	  $('.ledimcancel').click(function() {
		$(this).prev().val("Change name");
		$(this).prev().removeClass("success");
		$(this).prev().prev().addClass("aparece");
		 $(this).addClass("aparece");
		$(this).prev().prev().prev().toggle(); 
		return false;
	  });
});