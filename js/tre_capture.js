/* For use in data capture page.
 * 
 *
 */
$(document).ready(function() {
	console.log("Loading tre_capture.js....");
	addRecordTaskEventHandlers();
	addEditTaskEventHandlers();
	addObservationNotesEventHandlers();
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
function recordNote(data) {
	$.ajax({
		url: recordGlobalNoteUrl,
		type: "POST",
		dataType: 'json',
		data: data,
		success: function(data) {
			alert("yes");
		}
	});
}
/** Binds the task button events.
 * 
 * 
 */
function addRecordTaskEventHandlers() {
	$(".task-btn").click(function(e) {
		e.preventDefault();
		$('#recorded-task-panel-' + $(this).attr("dimension-id")).removeClass('tc-hide');
		$('#recorded-task-panel-' + $(this).attr("dimension-id")).flash('0.5', 1000);


		console.log($(this).text() + " clicked" + " Previous Task Id = " +
						$('#current-task-' + $(this).attr("dimension-id")).attr("current-task-id"));
		$.ajax({
			url: recordTaskUrl,
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

				console.log(data["start_time"] + ' ' + data["unix_time"] + ' ' + data["after_unix_time"]);
				console.log("Current Task Id = " +
								$('#current-task-' + data["dimension_id"]).attr("current-task-id"));
			}});
	});
}
function addEditTaskEventHandlers() {
	$('.edit-task-btn').click(function(e) {
		e.preventDefault();
		$(this).prev().removeClass('tc-hide');
		$(this).addClass('tc-hide');
		$(this).next().addClass('tc-hide');
		$(this).next().next().addClass('tc-hide');
		$(this).closest('.listblock').find('.edit-task').removeClass('tc-hide');
		$(this).closest('.listblock').find('.normal').addClass('tc-hide');

		var dimension = "edit-task-" + $(this).attr("dimension-id");
		var currentTaskName = $('#current-task-' + $(this).attr("dimension-id")).text().trim();
		$("input[name='" + dimension + "']").val(currentTaskName).select();
	});
	$('.cancel-edit-task-btn').click(function(e) {
		e.preventDefault();
		$(this).addClass('tc-hide');
		$(this).next().removeClass('tc-hide');
		$(this).next().next().removeClass('tc-hide');
		$(this).next().next().next().removeClass('tc-hide');
		$(this).closest('.listblock').find('.edit-task').addClass('tc-hide');
		$(this).closest('.listblock').find('.normal').removeClass('tc-hide');
	});
	$('.edit-task-save-btn').click(function(e) {
		e.preventDefault();
		$('.cancel-edit-task-btn').click();
		var dimension = "edit-task-" + $(this).attr("dimension-id");
		var taskName = $("input[name='" + dimension + "']").val();
		if (taskName.trim() == "") {
			alert("Task Name should not be blank");
		} else {
			/*	$.ajax({
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
			 
			 */
		}
	});
}
function addObservationNotesEventHandlers() {
	$('.observation-notes-btn').click(function(e) {
		e.preventDefault();
		$('#observation-log').slideToggle();
	});
	$("textarea[name='newnote']").keypress(function(e) {
		if (e.keyCode == 13) {
			var note = $(this).val().trim();
			if (note === "") {
				alert("Note cannote be blank");
			} else {
				data = {'observation_id': observationId,
					'global_note': note};
				$(this).val(null);
				recordNote(data);
			}
		}
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
