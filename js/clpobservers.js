$(document).ready(function() {
	
     $('#adminpriv').click(function() {
        $("#adminprivileges").slideToggle('slow');	
     });
	 
	  $('#activator').click(function() {
         var acstats =$('#actlabel').html().trim();
		if (acstats=="active"){
			inaactivat();
		}
		else{
			activat();
		}
     });
	 
	 $('#promoter').click(function() {
		 var curole =$('#inrole').html().trim();
		 if (curole=="Administrator"){
			$('#inrole').text("Observer");
			$('.foundicon-star').addClass("aparece");
			$(this).text("Promote to Admin");
			$.notify.alert('Admin privileges for this user have been revoked!', { autoClose : 3000 });
		 }
		 else{
			$('#inrole').text("Administrator");
			$('.foundicon-star').removeClass("aparece");
			$(this).text("Revoke admin privileges");
			$.notify.alert('Admin privileges granted!', { autoClose : 3000 });
		 }
		
     });
	
	 
	 
	 function inaactivat(){
		$('#actlabel').text("inactive");
		$('#actlabel').removeClass("success");
		$('#actlabel').addClass("alert");
		$('#bordestatus').removeClass("regordoon");
		$('#bordestatus').addClass("regordooff");
		$('#finstatu').removeClass("celeste");
		$('#finstatu').addClass("suaveoff");
		$('#activator').text("Activate");
		$.notify.alert('User has been inactivated!', { autoClose : 3000 });
	 }
	  function activat(){
		$('#actlabel').text("active");
		$('#actlabel').removeClass("alert");
		$('#actlabel').addClass("success");
		$('#bordestatus').removeClass("regordooff");
		$('#bordestatus').addClass("regordoon");
		$('#finstatu').removeClass("suaveoff");
		$('#finstatu').addClass("celeste");
		$('#activator').text("Inactivate");
		$.notify.alert('User has been Activated!', { autoClose : 3000 });
	 }
});