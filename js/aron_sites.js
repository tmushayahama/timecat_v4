/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var EDIT_TASK_MAP = [
	["#edit-taskname-field", ".taskname"],
	["#edit-taskdefinition-field", ".taskdefinition"],
	["#edit-taskstart-action-field", ".taskstart-action"],
	["#edit-taskend-action-field", ".taskend-action"]
];
$(document).ready(function() {
	console.log("loading aron_sites.js...");
	addEventHandlers();
	addInactive();
});

function addInactive() {

	$(".task-bottom").each(function(e) {
		if ($(this).attr("task-status") == 1) {
			$(this).removeClass("celeste")
							.addClass("suaveoff");
		}
	});
	$(".task-border").each(function(e) {
		if ($(this).attr("task-status") == 1) {
			$(this).removeClass("regordoon")
							.addClass("regordooff");
		}
	});
	$(".task-status-name").each(function(e) {
		if ($(this).attr("task-status") == 1) {
			$(this).removeClass("bverdon")
							.addClass("brojo")
							.text('inactive');
		}
	});
}
function addEventHandlers() {
	$('.editers').click(function(e) {
		e.preventDefault();
		for (var i = 0; i < EDIT_TASK_MAP.length; i++) {
			var value = $(this).closest(".sear").find(EDIT_TASK_MAP[i][1]).html().trim();
			$(EDIT_TASK_MAP[i][0]).val(value);
		}
		var taskid = $(this).closest(".sear").find('.taskid').data("taskid");
		$("#taksid").val(taskid);
		$('#edit-sites-modal').foundation('reveal', 'open');
	});
}
