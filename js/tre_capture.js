/* For use in data capture page.
 * 
 *
 */
$(document).ready(function() {
	console.log("Loading tre_capture.js....");
	addTaskButtonEvents();
});
/**
 * To animate a blink of the recorded task. 
 * 
 *An approach of using opacity is taken.
 * @param {type} opacity the opacity to animate to
 * @param {type} duration how long the animation will take. This number will be divided by 2
 * before the opacity goes back
 */
jQuery.fn.flash = function(opacity, duration)
{
	var current = this.css('opacity');
	this.animate({opacity: opacity}, duration / 2);
	this.animate({opacity: current}, duration / 2);
};

/** Binds the task button events.
 * 
 * 
 */
function addTaskButtonEvents() {
	$(".task-btn").click(function(e) {
		$('#recorded-task-panel-' + $(this).attr("dimension-id")).removeClass('tc-hide');
		e.preventDefault();
		console.log($(this).text() + " clicked" + " Previous Task Id = " +
						$('#current-task-' + $(this).attr("dimension-id")).attr("current-task-id"));
		$.ajax({
			url: record_task_url,
			type: "POST",
			dataType: 'json',
			data: {"current_task_id": $(this).attr("current-task-id"),
				"observation_id": $(this).attr("observation-id"),
				"previous_observation_task_id": ($('#current-task-' + $(this).attr("dimension-id")).attr("current-task-id") == undefined) ?
								0 :
								$('#current-task-' + $(this).attr("dimension-id")).attr("current-task-id")
			},
			success: function(data) {

				$('#recorded-tasks-' + data["dimension_id"]).prepend(data["recorded_task_row"]);
				$('#current-task-' + data["dimension_id"]).attr("current-task-id", data["current_observation_task_id"]);
				recordCurrentTask(data["dimension_id"], data["taskname"], data["start_time"]);
					$('#recorded-task-panel-' + data["dimension-id"]).flash('0.5', 1000);
		
				console.log(data["start_time"] + ' ' + data["unix_time"] + ' ' + data["after_unix_time"]);
				console.log("Current Task Id = " +
								$('#current-task-' + data["dimension_id"]).attr("current-task-id"));
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
