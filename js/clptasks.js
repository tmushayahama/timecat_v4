$(document).ready(function() {
	$('.editers').click(function(e) {
		e.preventDefault();

		var taskname = $(this).closest(".sear").find('.vnam').html().trim();
		$("#StudyTasks_name").val(taskname);
		$("#tknameti").text(taskname);
		var taskid = $(this).closest(".sear").find('.tkid').data("tkid");
		$("#letaksid").val(taskid);
		var defintion = $(this).closest(".sear").find('.vdef').html().trim();
		$("#StudyTasks_definition").val(defintion);
		var tstarts = $(this).closest(".sear").find('.vstars').html().trim();
		$("#StudyTasks_start_action").val(tstarts);
		var tends = $(this).closest(".sear").find('.vends').html().trim();
		$("#StudyTasks_end_action").val(tends);
		var acstats = $(this).closest(".sear").find('.statuser').html().trim();
		$('#active').prop('checked', false);
		$('#inactive').prop('checked', false);
		$('#' + acstats).prop('checked', true);
		$('#editTask').foundation('reveal', 'open');
	});
});