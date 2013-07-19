$(document).ready(function() {
console.log("Loading clpcapture.js...");
var specnote=false;	
var editing = [];
var linking = [];
	//Note taking feature functions and listeners
	$("body").on("click", ".singlenote", function(){
		var tasknamerobj = $(this).closest(".papa").find('.tasknamer');
		var taskid =$(tasknamerobj).data("tkid");
		var taskname =$(tasknamerobj).text();
		
		specnote=taskname;
		$('#notetypo').text("Note for "+ taskname);
		
		if(!$('#observelog').hasClass('onfire')){
			notecloser();
		}
		 return false;
	});	
	$('#noter1').click(function() {
		specnote=false;
		$('#notetypo').text("General note");
		notecloser();
		var neonots = $("#newnote").val();
		if (neonots) {
			notestorer();
		}
		
	});	
	$('#notecloser').click(function() {
		var neonots = $("#newnote").val();
		if (neonots) {
			notestorer();

		}
		else{
			notecloser();

		}
		return false;
	});	
	
	$('#newnote').keypress(function(e){
		if(e.keyCode == 13) {
		   e.preventDefault();
		   var neonots = $(this).val();
			if (neonots) {
				notestorer();
			}
		}
	});

	function notecloser(){
		$('#observelog').slideToggle();
		$('#observelog').toggleClass("onfire");
	}

	function notestorer(){
		var neonots = $("#newnote").val();
		$('#thenotes').scrollTop($('#thenotes').prop("scrollHeight"));
		var newNote = $('#thenotes .onenote:last-child').clone();
		var currentTime = $('#currenttime').html();
		newNote.find('.notetime').html(currentTime);
		newNote.find('.notexts').text(neonots);
		var thetype = ( specnote ? specnote : "Global note" );
		newNote.find('.notetype').text(thetype);
		$(newNote).insertAfter('#thenotes .onenote:last-child').hide().slideDown();
		$("#newnote").val('');
		specnote=false;
	}
	
	/*Record tasks functions and listeners*/
	$('.tasktrig').click(function() {
		var dimension =$(this).closest(".megablock").data("dimen");
		if (!linking[dimension]){
		var taskid =$(this).data("tkid");
		var pretaskname =$(this).text();
		if(editing[dimension]){
			//el taskid id ha de ser el que devuelve el lastmysql insert. le mando el taskid y espero un nuevomysqltaskid
			var mysqlid=taskid;
			savediter(dimension,pretaskname,mysqlid)
			toglediter(dimension);
		}
		else{
			var taskname = ( taskid == 1 ? "Other" : pretaskname );
			var currtime =$('#currenttime').html();
			
			var tasknamer =$('#currentasker'+dimension).find('.tasknamer');
			var stoptaskid = $(tasknamer).data("tkid");
			var stoptaskname = $(tasknamer).text();
			var taskstamp = $('#currentasker'+dimension).find('.letaskstamp');
			var oldstartime = $(taskstamp).html();
			
			$(tasknamer).data("tkid",taskid);
			$(tasknamer).text(taskname);
			$(taskstamp).html(currtime);
			var neodurati = $('<span class="hors">00</span>h <span class="mins">00</span>m <span class="secs">00</span>s');
			$('#currentasker'+dimension).find('.taskruat').html(neodurati);
			$('#currentasker'+dimension).find('.linkto').show();
			$('#currentasker'+dimension).find('.timfix').removeClass("disabled");
			$('#currentasker'+dimension).hide().fadeIn("slow");
			
			var neotblock = $('<div class="fullist limpia grisos papa"><p><span class="tasknamer letaskname eliseo left" data-tkid="NULL">NULL</span><a href="#" class="breaknotifier button secondary small "><i class="foundicon-checkmark"></i></a><i class="foundicon-down-arrow "></i><span class="letaskstamp">NULL</span><a href="#" class="linkfrom button small right aparece">Select</a><a href="#" class="singlenote button secondary small right"><i class="foundicon-edit"></i></a></p></div>');
			neotblock.find('.tasknamer').data("tkid",stoptaskid);
			neotblock.find('.tasknamer').text(stoptaskname);
			neotblock.find('.letaskstamp').html(oldstartime);
			var leinner = $('#currentasker'+dimension).parent();
			$(neotblock).insertAfter(leinner).hide().slideDown();
			
			}
		}
		return false;
	});	
	//taks name editer functions
	$('.editer').click(function() {
		var dimension =$(this).closest(".megablock").data("dimen");
		if (!linking[dimension]){
			toglediter(dimension);
		}
		return false;
	});	
	
	
	function toglediter(dimen){
		var este = $('#currentasker'+dimen).find('.editer');
		if (editing[dimen]){
		//back to normal
		$(este).text('Edit name');
		$(este).addClass('secondary');
		$(este).removeClass('alert');
		editing[dimen]=false;
		}
		else{
		//prepare to edit
		$(este).text('Cancel');
		$(este).addClass('alert');
		$(este).removeClass('secondary');
		editing[dimen]=true;
		}
		
		$('#currentasker'+dimen).closest(".megablock").find('.tasktrig').toggleClass('eliger');
		$('#currentasker'+dimen).find('.normal').toggle();
		$('#currentasker'+dimen).find('.aleditar').toggle();
		$('#currentasker'+dimen).find('.linkto').toggle();
		$('#currentasker'+dimen).find('.timfix').toggle();
	}
	
	function savediter(dimen,tname,tkid){
		$('#currentasker'+dimen).find('.tasknamer').data("tkid",tkid);
		$('#currentasker'+dimen).find('.tasknamer').text(tname);
	}
		
	$('input[name="freetexttask"]').keypress(function(e){
	  if(e.keyCode == 13) {
	   e.preventDefault();
	   var neofretaks = $(this).val();
		if (neofretaks) {
			var dimension =$(this).closest(".megablock").data("dimen");
			trigereditsave(dimension,neofretaks);
		}

	  }
	});
	
	$('.saveledit').click(function() {
		var dimension =$(this).closest(".megablock").data("dimen");
		var nuevatask =$('#currentasker'+dimension).find('input[name="freetexttask"]').val();
		if (nuevatask){
			trigereditsave(dimension,nuevatask);
		}
		return false;
	});	
	function trigereditsave(dimen,taname){
		var mysqlid=4835;//Aqui debe ir la mysqltaskid recibida
		savediter(dimen,taname,mysqlid)
		toglediter(dimen);	
		$('#currentasker'+dimen).find('input[name="freetexttask"]').val('');
	}

	//deleter of tasks
	$('.borrat').click(function() {
		var dimension =$(this).closest(".megablock").data("dimen");
			if (confirm('Are you sure you want to delete this running task?')) {
				// delete it!
				console.log("borrando");
					//llamar por ajax a php mini script para reemplazar por completo el div que contiene la lista de tareas para esta dimension.
			} else {
				// Do nothing!
				console.log("cancelando");
			}
		return false;
	});	
	
	//link to old task (resuming tasks)
	$('.linkto').click(function() {
		var dimension =$(this).closest(".megablock").data("dimen");
		toglelinker(dimension);
		return false;
	});	

	$("body").on("click", ".linkfrom", function(){
		console.log("linking from");
		var dimen =$(this).closest(".megablock").data("dimen");
		toglelinker(dimen);
		//$('#currentasker'+dimen).find('.tasknamer').append(" (resumed)");
		$('#currentasker'+dimen).find('.maininfo b:first').text("Resumed at ");
		$('#currentasker'+dimen).find('.linkto').hide();
		$(this).prev().prev().prev().html('<i class="foundicon-plus"></i>');
		$(this).closest('.actilist').animate({scrollTop: 0}, 1000);
		//$("div.demo").scrollTop(300);
		return false;
	});	
	
	function toglelinker(dimen){
		var este =$('#currentasker'+dimen).find('.linkto');
		if (linking[dimen]){
		//back to normal
		$(este).text('Link to');
		$(este).addClass('secondary');
		$(este).removeClass('alert');
		linking[dimen]=false;
		}
		else{
		//prepare to edit
		$(este).text('Cancel');
		$(este).addClass('alert');
		$(este).removeClass('secondary');
		linking[dimen]=true;
		}
		var sourcenam = $('#currentasker'+dimen).find('.tasknamer').text();
		$('#currentasker'+dimen).closest('.actilist').find('.fullist').each(function() {
			var targetnam = $(this).find('.tasknamer').text();
			if(sourcenam==targetnam){
				$(this).find('.linkfrom').toggle();
				var parao =$(this).find('i:first').hasClass("foundicon-error");
				if(parao){
					$(this).toggleClass("withborder");
				}
			}
			$(this).find('.singlenote').toggle();
		});
		$('#currentasker'+dimen).closest(".megablock").find('.tasktrig').toggleClass('disabled');
		$('#currentasker'+dimen).find('.editer').toggleClass('disabled');
		$('#currentasker'+dimen).find('.timfix').toggleClass('disabled');
		$('#currentasker'+dimen).find('.normal .borrat, .normal .tasktrig').toggle();
	}
	
	//alert broken task
	$("body").on("click", ".breaknotifier", function(){
		var dimension =$(this).closest(".megablock").data("dimen");
		if (!linking[dimension]){
			var resumed =$(this).find('i').hasClass("foundicon-plus");
			if(!resumed){
				var letaskid = $(this).prev().data("tkid");
				console.log(letaskid);
				var completed =$(this).find('i').hasClass("foundicon-checkmark");
				if(completed){
					$(this).html('<i class="foundicon-error"></i>');
				}
				else{
					$(this).html('<i class="foundicon-checkmark"></i>');
				}
			}
		}
		return false;
	});	
	
	//fixtime (-1 secs)
	$('.timfix').click(function() {
		var dimen =$(this).closest(".megablock").data("dimen");
		var timstring = $('#currentasker'+dimen).find('.letaskstamp').text();
		var timeArray = timstring.split(':');
		var oriTime = timeArray[0]+timeArray[1]+timeArray[2];
		
		var prevTimString = $(this).closest('.actilist').find('.fullist .letaskstamp').first().text();
		var prevTimeArray = prevTimString.split(':');
		var prevInteTimer = prevTimeArray[0]+prevTimeArray[1]+prevTimeArray[2];
		
		if((+oriTime)==(+prevInteTimer)){
			$(this).addClass('disabled');
			console.log("max fix reached");
		}
		else{
			var escupArray = timetravel(timeArray[0],timeArray[1],timeArray[2]);
			var fixedTime = escupArray[0]+escupArray[1]+escupArray[2];
			
			if((+fixedTime)==(+prevInteTimer)){
					$(this).addClass('disabled');
					console.log("max fix reached");	
			}
			else{
					var nuevoTiempo = escupArray[0]+":"+escupArray[1]+":"+escupArray[2];
				//cambiar el tiempo
				$('#currentasker'+dimen).find('.letaskstamp').text(nuevoTiempo);
				console.log("fixing time");
			}
		}
		
		
		
	
		
		
		
		return false;
	});
	//fucntion to subsract one second to time
	function timetravel(hor,min,seg){
		if(seg>0){
			seg=seg-1;
		}
		else{
			if(min>0){
				min=min-1;
				seg=59;
			}
			else{
				if(hor>0){
					hor=hor-1;
					min=59;
					seg=59;
				}
				else{
					hor=23;
					min=59;
					seg=59;	
				}
			}
		}
		seg = ( seg < 10 ? "0" : "" ) + (+seg);
		min = ( min < 10 ? "0" : "" ) + (+min);
		hor = ( hor < 10 ? "0" : "" ) + (+hor);
		var retornArray =[hor,min,seg];
		return retornArray;
	}
});