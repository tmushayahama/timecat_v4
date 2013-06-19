/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var EDIT_TASK_MAP = [["#edit-taskname-field", "#task-name"],
	["#edit-taskcategory-field", "#task-category"],
	["#edit-taskdefinition-field", "#task-definition"],
	["#edit-taskstatus-field", "#task-status"]
];
$(document).ready(function() {
	console.log("loading tasks.js...");
	addEventHandlers();
});

function addEventHandlers() {
	$('.task-edit').click(function(e) {
		for (var i = 0; i < EDIT_TASK_MAP.length; i++) {
			$(EDIT_TASK_MAP[i][0]).val($.trim($(EDIT_TASK_MAP[i][1] + $(this).attr('update-target-id')).text()));
		}
	});
}
