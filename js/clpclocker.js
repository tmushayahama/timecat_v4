$(document).ready(function() {
	 /*clock stuff here, move to differnet file once working*/
	
	function modiclocks(){
	$('.clocks').each(function() {
	
		var segundo=$(this).find('.secs').html();
		var minuto=$(this).find('.mins').html();
		var hora=$(this).find('.hors').html();
		var timer=$(this).data("timer");
		
		//checker
		if((+segundo)<59){
			var neoseg = (+segundo) + 1;
			var neomin = (+minuto);
			var neohor = (+hora);
		}
		else{
			var neoseg = 0;
			if((+minuto)<59){
				var neomin = (+minuto) + 1;
				var neohor = (+hora);
			}
			else{
				var neomin = 0;
				
				if(((+hora)<23) || (timer==true)){
					var neohor = (+hora) +1;
				}
				else{
					var neohor = 0;
				}
			}
		}
		neoseg = ( neoseg < 10 ? "0" : "" ) + neoseg;
		neomin = ( neomin < 10 ? "0" : "" ) + neomin;
		neohor = ( neohor < 10 ? "0" : "" ) + neohor;
		$(this).find('.secs').html(neoseg);
		$(this).find('.mins').html(neomin);
		$(this).find('.hors').html(neohor);
	});
	}
	setInterval(modiclocks, 1000);
});