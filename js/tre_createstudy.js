/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
	console.log("loading tre_createstudy");
	selectStudyType();
});
function selectStudyType() {
	$(".chooser").click(function(e) {
		$("#" + $(this).attr("radio-btn-target")).prop("checked", true);
	});
}



