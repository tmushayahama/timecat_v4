/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
	console.log("Loading tre_capture.js....");
	initCapturePanel();
	addTaskButtonEvents();
});

function initCapturePanel() {
	$(".tc-hide").each(function() {
		if ($(this).attr("has-current-task") == true) {
			$(this).removeClass("tc-hide");
		}
	});
}
function addTaskButtonEvents() {
	$(".task-btn").click(function(e) {
		e.preventDefault();
		console.log($(this).text() + " clicked");
		$.ajax({
			url: record_task_url,
			type: "POST",
			data: {"task_id": $(this).attr("task-id"),
				"observation_id": $(this).attr("observation-id")},
			//"task_start_time": getCurrentTime($("#currenttime")),//$(this).attr("task-start-time")},
			success: function(data) {
				console.log("AJAX task recorded");
				addRecordedTaskEntry($(this).text());
			}});
	});
}
//function getCurrentTime(currentTimeDiv) {
//return currentTime.children(".hors").html()+
//}

