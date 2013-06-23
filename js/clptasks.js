$(document).ready(function() {
     $('.editers').click(function(e) {
          e.preventDefault();
		 
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
		  var acstats =$(this).closest(".sear").find('.statuser').html().trim();
		  $('#active').prop('checked',false);
		  $('#inactive').prop('checked',false);
		  $('#' + acstats).prop('checked',true);
		  $('#editTask').foundation('reveal', 'open');
     });
});