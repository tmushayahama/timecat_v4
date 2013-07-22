/* 
 * This js is for all html components added
 */
function addRecordedTaskEntry(taskname) {
	$(".tc-recorded-task-panel")
					.prepend($("<div />")
					.addClass("fullist limpia grisos papa")
					.append($("<p />")
					.append($("<span />")
					.addClass("tasknamer letaskname eliseo left")
					.attr('task-id', '')
					.text(taskname))
					.append($("<a />")
					.addClass("breaknotifier button secondary small ")
					.append($("<i />")
					.addClass("foundicon-checkmark")))
					.append($("<i />")
					.addClass("foundicon-down-arrow")
					.append($("<span />")
					.addClass("letaskstamp")))
					.append($("<a />")
					.addClass("linkfrom button small right aparece")
					.text("Select"))
					.append($("<a />")
					.addClass("singlenote button secondary small right")
					.append($("<i />")
					.addClass("foundicon-edit")))));
}


