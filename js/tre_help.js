$(document).ready(function() {
	console.log("Loading tre_help.js...");
	$('body').scrollspy();
 $("#help-sidebar").affix();
 $(".right-sidebar").css('height', $("#content").css("height"));
 
  //equalHeight($(".thumbnail"));
});
function equalHeight(group) { 
    tallest = 0;    
    group.each(function() {       
        thisHeight = $(this).height();       
        if(thisHeight > tallest) {          
            tallest = thisHeight;       
        }    
    });    
    group.each(function() { $(this).height(tallest); });
} 
