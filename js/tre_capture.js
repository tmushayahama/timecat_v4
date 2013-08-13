/** For use in data capture page.
 * 
 * Most of the calls are ajax calls to the 
 */
$(document).ready(function() {
	console.log("Loading tre_capture.js...");
	$.ajaxSetup({traditional: true});
	addRecordTaskEventHandlers();
	addEditTaskEventHandlers();
	addObservationNotesEventHandlers();
	addLinkToEventHandlers();
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
	var current = this.css('backgroundColor');
	this.animate({backgroundColor: opacity}, duration / 2);
	this.animate({backgroundColor: current}, duration / 2);
};
/**
 * 
 * @param  listblockChild
 * @returns 
 */
function getCurrentTaskName(listblockChild) {
	return listblockChild.closest(".listblock").find(".current-task-name").text();
}
function getCurrentTaskId(listblockChild) {
	return listblockChild.closest(".listblock").find(".current-task-name").attr("current-task-id");
}

function recordCurrentTask(dimensionId, taskname, startTime) {//, currentTimeDiv) {
	$('#current-task-' + dimensionId).text(taskname);
	$('#current-task-start-time-' + dimensionId).text(startTime);
	$('#current-task-duration-hours-' + dimensionId).text("00");
	$('#current-task-duration-mins-' + dimensionId).text("00");
	$('#current-task-duration-secs-' + dimensionId).text("00");
}
function getCurrentTaskNameByDimension(dimensionId) {
	$('#current-task-' + dimensionId).attr('current-task');
}
function ajaxCall(url, data, callback) {
	$.ajax({
		url: url,
		type: "POST",
		dataType: 'json',
		data: data,
		success: callback
	});
}
function recordTask(data) {
	$('#recorded-tasks-' + data["dimension_id"]).prepend(data["recorded_task_row"]);
	$('#recorded-tasks-' + data["dimension_id"] + " :first-child").hide().slideDown();
	$('#current-task-' + data["dimension_id"]).attr("current-task-id", data["current_observation_task_id"]);
	recordCurrentTask(data["dimension_id"], data["taskname"], data["start_time"]);
	$('#recorded-task-panel-' + data["dimension_id"]).removeClass('tc-hide');
	$('#recorded-task-panel-' + data["dimension_id"]).hide().fadeIn("slow");

	var noteBtn = $('#recorded-tasks-' + data["dimension_id"] + " :first-child").find(".recorded-task-note-btn");
	addRecordedTaskNoteBtnEventHandlers(noteBtn);
	console.log(data["start_time"] + ' ' + data["unix_time"] + ' ' + data["after_unix_time"]);
	console.log("Current Task Id = " +
					$('#current-task-' + data["dimension_id"]).attr("current-task-id"));
}
function recordNote(data) {
	$('#all-recorded-notes').append(data["recorded_note_row"]);
}

/*==============================EVENT HANDLERS================================*/
/**
 *  Binds the task button events.
 * 
 * 
 */
function addRecordTaskEventHandlers() {
	$(".task-btn").click(function(e) {
		e.preventDefault();
		console.log($(this).text() + " clicked" + " Previous Task Id = " +
						$('#current-task-' + $(this).attr("dimension-id")).attr("current-task-id"));

		data = {"current_task_id": $(this).attr("current-task-id"),
			"observation_id": $(this).attr("observation-id"),
			"previous_observation_task_id": ($('#current-task-' + $(this).attr("dimension-id")).attr("current-task-id") == undefined) ?
							0 :
							$('#current-task-' + $(this).attr("dimension-id")).attr("current-task-id")
		};
		ajaxCall(recordTaskUrl, data, recordTask);

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

		}
	});
}
function addObservationNotesEventHandlers() {
	$('.observation-notes-btn').click(function(e) {
		e.preventDefault();
		$("#note-type").attr("observation-task-id", 0);
		$("#note-type").text("Global Note");
		$("textarea[name='new-note']").attr("placeholder", "Write global notes here");
		$('#observation-log').slideToggle();
	});
	$('.current-task-note-btn').click(function(e) {
		e.preventDefault();
		var taskName = $("#current-task-" + $(this).attr("dimension-id")).text().trim();
		$("#note-type").attr("observation-task-id", $("#current-task-" + $(this).attr("dimension-id")).attr("current-task-id"));
		$("#note-type").text("Note for " + taskName);
		$("textarea[name='new-note']").attr("placeholder", "Write notes for " + taskName + " here");
		$('#observation-log').slideDown();
	});
	$('.recorded-task-note-btn').click(function(e) {
		e.preventDefault();
		var taskId = $(this).closest(".recorded-task-row").find(".recorded-task-name").attr("task-id");
		var taskName = $(this).closest(".recorded-task-row").find(".recorded-task-name").text().trim();
		$("#note-type")
						.attr("observation-task-id", taskId)
						.text("Note for " + taskName);
		$("textarea[name='new-note']").attr("placeholder", "Write notes for " + taskName + " here");
		$('#observation-log').slideDown();
	});
	$("textarea[name='new-note']").keypress(function(e) {
		if (e.keyCode == 13) {
			var note = $(this).val().trim();
			if (note === "") {
				alert("Note cannote be blank");
			} else {
				data = {"observation_id": observationId,
					"observation_task_id": $("#note-type").attr("observation-task-id"),
					"note": note};
				ajaxCall(recordNoteUrl, data, recordNote);
				$(this).val('');
			}
		}
	});
}
function addRecordedTaskNoteBtnEventHandlers(btn) {
	btn.click(function(e) {
		e.preventDefault();
		var taskId = $(this).closest(".recorded-task-row").find(".recorded-task-name").attr("task-id");
		var taskName = $(this).closest(".recorded-task-row").find(".recorded-task-name").text().trim();
		$("#note-type")
						.attr("observation-task-id", taskId)
						.text("Note for " + taskName);
		$("textarea[name='new-note']").attr("placeholder", "Write notes for " + taskName + " here");
		$('#observation-log').slideDown();
	});
}
function addLinkToEventHandlers() {
	$(".current-task-linkto-btn").click(function(e) {
		e.preventDefault();
		var linkToTaskId = getCurrentTaskId($(this));
		alert(linkToTaskId);
	});
}