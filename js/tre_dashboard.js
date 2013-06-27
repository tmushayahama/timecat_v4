/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
	console.log("loading tre_dashboard");
	rearrangeStudies();
});
function rearrangeStudies() {
	var studies = $("#study-row").children();
	for (var i = 0; i < studies.length; i += 2) {
		studies.slice(i, i + 2).wrapAll('<div class="row"></div>');
	}
}



