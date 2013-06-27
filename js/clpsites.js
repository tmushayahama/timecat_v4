$(document).ready(function() {
     $('.editers').click(function(e) {
          e.preventDefault();
		 
		  var sitemeti =$(this).closest(".sear").find('.vnam').html().trim();
		  $("#sitename").val(sitemeti);
		  $("#sitemeti").text(sitemeti);
		  var siteid =$(this).closest(".sear").find('.stid').data("stid");
		   $("#siteid").val(siteid);
	
		var thetmz =$(this).closest(".sear").find('.vdef').data("thetmz");
		 $("#timezone2").val(thetmz);
		
		  var acstats =$(this).closest(".sear").find('.label').html().trim();
		  $('#active').prop('checked',false);
		  $('#inactive').prop('checked',false);
		  $('#' + acstats).prop('checked',true);
		  $('#editSite').foundation('reveal', 'open');
     });
});