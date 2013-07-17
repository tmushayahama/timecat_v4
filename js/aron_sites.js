/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var EDIT_SITE_MAP = [
    ["#edit-sitename-field", ".sitename"]
];
$(document).ready(function() {
    console.log("loading aron_sites.js...");
    addEventHandlers();
    addInactive();
});

function addInactive() {

    $(".site-bottom").each(function(e) {
        if ($(this).attr("site-status") == 1) {
            $(this).removeClass("celeste")
                    .addClass("suaveoff");
        }
    });
    $(".site-border").each(function(e) {
        if ($(this).attr("site-status") == 1) {
            $(this).removeClass("regordoon")
                    .addClass("regordooff");
        }
    });
    $(".site-status-name").each(function(e) {
        if ($(this).attr("site-status") == 1) {
            $(this).removeClass("bverdon")
                    .addClass("brojo")
                    .text('inactive');
        }
    });
}
function addEventHandlers() {
    $('.editers').click(function(e) {
        e.preventDefault();
        for (var i = 0; i < EDIT_SITE_MAP.length; i++) {
            // alert($(this).closest(".sear").find(EDIT_SITE_MAP[i][1]).html()); 

            var value = $(this).closest(".sear").find(EDIT_SITE_MAP[i][1]).html().trim();
            $(EDIT_SITE_MAP[i][0]).val(value);
        }
        var siteid = $(this).closest(".sear").find('.siteid').data("siteid");
        $("#siteid").val(siteid);
        $('#edit-sites-modal').foundation('reveal', 'open');
    });
}
