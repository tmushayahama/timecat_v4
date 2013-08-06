/* For use in data capture page.
 * 
 *
 */
$(document).ready(function() {
	console.log("Loading tre_capture.js....");
	initCapturePanel();
	addTaskButtonEvents();
});
/*
 * Initialize the task dimensions panel by checking if there was a 
 * current task, i.e. if it is resumed
 */
function initCapturePanel() {
	$(".tc-hide").each(function() {
		if ($(this).attr("has-current-task") == true) {
			$(this).removeClass("tc-hide");
		}
	});
}
/** Binds the task button events.
 * 
 * 
 */
function addTaskButtonEvents() {
	$(".task-btn").click(function(e) {
		e.preventDefault();
		console.log($(this).text() + " clicked");
		$.ajax({
			url: record_task_url,
			type: "POST",
			dataType: 'json',
			data: {"task_id": $(this).attr("task-id"),
				"observation_id": $(this).attr("observation-id"),
				//"dimension_id": $(this).attr("dimension-id")
			},
			success: function(data) {
				console.log("AJAX task recorded " + data + ' ' + data["taskname"]);
				console.log("dim-id " + data["dimension_id"]);

				addRecordedTaskEntry('#recorded-tasks-' + data["dimension_id"],
								$('#current-task-' + data["dimension_id"]).text(),
								data["start_time"]
								);
				recordCurrentTask(data["dimension_id"], data["taskname"], data["start_time"]);
			}});
	});
}

function recordCurrentTask(dimensionId, taskname, startTime) {//, currentTimeDiv) {
	$('#current-task-' + dimensionId).text(taskname);
	$('#current-task-start-time-' + dimensionId).text(startTime);
	$('#current-task-duration-hours-' + dimensionId).text("00");
	$('#current-task-duration-mins-' + dimensionId).text("00");
	$('#current-task-duration-secs-' + dimensionId).text("00");
}
function getCurrentTask(dimensionId) {
	$('#current-task-' + dimensionId).attr('current-task');

}
