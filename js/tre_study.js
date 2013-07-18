$(document).ready(function() {
	console.log("Loading the tre study.js ...");
	selectObservationType();

	$("#newobseform").on("submit", function(event) {
		event.preventDefault();
		var obsite = $("#lesiters option:selected").val();
		var obstip = $('#obstype').val();
		if (!obstip) {
			$.notify.alert('"Observation type" is required to begin an observation', {autoClose: 4000});
		}
		else {
			if (!obsite) {
				$.notify.alert('"Site" is required to begin an observation', {autoClose: 4000});
			}
			else {
				var request = $.ajax({
					url: "../listeners/obscoater.php",
					type: "POST",
					data: $("#newobseform").serialize(),
					dataType: "json"
				});

				request.done(function(msg) {
					if (msg.clp) {
						//alert("login successfull");
						window.location.href = "../observation/";
					}
					else {
						$.notify.error(msg.msm, {autoClose: 5500});
						//alert(msg.msm);
					}

				});

				request.fail(function(jqXHR, textStatus, msg) {
					alert("Request failed: " + textStatus);
					console.log(msg);
				});
			}
		}
	});
});
/**Select the Observation type radio type after clicking on of the 
 * buttons representing the observation type
 * 
 * @returns {undefined}
 */
function selectObservationType() {
	$(".observations-type-btn").click(function(e) {
		//remove all the success(green) color on the buttons
		$(".observations-type-btn").removeClass('success');
		$(this).addClass('success');
		$("#" + $(this).attr("radio-btn-target")).prop("checked", true);
	});
}