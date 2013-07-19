/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
	console.log("Loading tre_capture.js...");
	addTaskButtonEvents();
});

function addTaskButtonEvents() {
	$(".task-btn").click(function(e) {
		e.preventDefault();
		console.log("me clicked");
		alert($("#currenttime").html());
		$.ajax({
			url: record_task_url,
			type: "POST",
			data: {"task_id": $(this).attr("task-id"),
				"observation_id": $(this).attr("observation-id")},
			success: function(data) {
				console.log("AJAX task recorded");
	
			}});
	});
}
function recordTime() {

}
