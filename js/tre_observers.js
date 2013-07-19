/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
;
$(document).ready(function() {
    console.log("loading observers.js...");
    colorStatus();
});

function colorStatus() {

    $(".observer-bottom").each(function(e) {
        if ($(this).attr("observer-status") == 2) {
            $(this).removeClass("celeste")
                    .addClass("suaveoff");
        } else if ($(this).attr("observer-status") == 1) {
            $(this).removeClass("celeste")
                    .addClass("observer-pending-bottom");
        }
    });
    $(".observer-border").each(function(e) {
        if ($(this).attr("observer-status") == 2) {
            $(this).removeClass("regordoon")
                    .addClass("regordooff");
        } else if ($(this).attr("observer-status") == 1) {
            $(this).removeClass("regordoon")
                    .addClass("observer-pending-border");
        }
    });
    $(".observer-status-name").each(function(e) {
        if ($(this).attr("observer-status") == 2) {
            $(this)//.removeClass("bverdon success")
                    .addClass("brojo")
                    .text('inactive');
        } else if ($(this).attr("observer-status") == 1) {
            $(this)//.removeClass("bverdon success")
                    .addClass("observer-pending-status-name")
                    .text('pending request');
        } else if ($(this).attr("observer-status") == 0) {
            $(this)//.removeClass("bverdon success")
                    .addClass("bverdon success")
                    .text('active');
        }
    });
}

