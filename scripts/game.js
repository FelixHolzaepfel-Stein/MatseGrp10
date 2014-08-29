$(function() {
	$('#game').click(function () {
					$.ajax('game.php')
						.done(function (data) { 
							$('#divGame')
								.empty()
								.append(data)
								.show();
							$('#divMain').hide();
							$('#divAllianz').hide();
							$('#divMail').hide();
							$('#divProfil').hide();
							$('#divRanking').hide();
							$('#divShop').hide();
							
							erstelleSpielfeld();
						});
				});
});

function erstelleSpielfeld(){
	
	var htmlstring = '<table id="Feldtabelle">';
	
	for (i = 1; i <= 3; i++) {
	
		htmlstring += '<tr>';
	
		for (j = 1; j <= 3; j++) {
		
			id = '' + i + j;
		
			htmlstring += '<td><input id="' 
					   + id 
					   + '" type="button" class="feldButton" onclick="besetzeFeld(' 
					   + id 
					   + ')" /></td>';
		}
		
		htmlstring += '</tr>';
	}
	
	htmlstring += '</table>';
				   

	$('#spielfeld').html(htmlstring);		   
}

function besetzeFeld(id){
	$('#' + id).addClass('kreuz');
	$('#' + id).prop("disabled", true);
	istSiegzustand();
	zugDerKI();
}

function zugDerKI(){
	
	var arr = zuegeMoeglich();
	
	if(arr.length == 0){
	    verteilePunkte(0);
	}
	
	var zielfeld = arr[Math.floor((Math.random() * arr.length))];
	
	$('#' + zielfeld).addClass('kreis');
	$('#' + zielfeld).prop("disabled", true);
	
	istSiegzustand();
}

function disableAlleFelder(){
	for (i = 1; i <= 3; i++) {
		for (j = 1; j <= 3; j++) {
		
			id = '' + i + j;
		
			$('#' + id).prop("disabled", true);
		}
	}
}

function istSiegzustand(){
	var kreis = true;
	var kreuz = true;

	//Horizontale Reihenabfrage
	for(var i = 1; i <= 3; i++){
	
		for (var j = 1; j <= 3; j++) {
	
			id = '' + i + j;
		
			if(!$('#' + id).hasClass('kreuz')){
				kreuz = false;
			}
		
			if(!$('#' + id).hasClass('kreis')){
				kreis = false;
			}
		
		}
	
		if(kreis){
			return verteilePunkte(2);
		}
	
		if(kreuz){
			return verteilePunkte(1);
		}
		
		kreis = true;
		kreuz = true;
	
	}
	
	//Vertikale Reihenabfrage
	for(var j = 1; j <= 3; j++){
	
		for (var i = 1; i <= 3; i++) {
	
			id = '' + i + j;
		
			if(!$('#' + id).hasClass('kreuz')){
				kreuz = false;
			}
		
			if(!$('#' + id).hasClass('kreis')){
				kreis = false;
			}
		
		}
	
		if(kreis){
			return verteilePunkte(2);
		}
	
		if(kreuz){
			return verteilePunkte(1);
		}
		
		kreis = true;
		kreuz = true;
	
	}
	
	//Diagonal
	if($('#22').hasClass('kreuz')){
		if($('#11').hasClass('kreuz') && $('#22').hasClass('kreuz') && $('#33').hasClass('kreuz')){
			return verteilePunkte(1);
		}
		if($('#31').hasClass('kreuz') && $('#22').hasClass('kreuz') && $('#13').hasClass('kreuz')){
			return verteilePunkte(1);
		}
	}

	if($('#22').hasClass('kreis')){
		if($('#11').hasClass('kreis') && $('#22').hasClass(kreis) && $('#33').hasClass('kreis')){
			return verteilePunkte(2);
		}
		if($('#31').hasClass('kreis') && $('#22').hasClass('kreis') && $('#13').hasClass('kreis')){
			return verteilePunkte(2);
		}
	}
}

function verteilePunkte(sieger){
	//Unentschieden
	if(sieger == 0){
		alert('Unentschieden!');
		disableAlleFelder('Unentschieden');
		//throw { name: 'FatalError', message: 'Something went badly wrong' };
		return false;
	}
	//Gewonnen
	if(sieger == 1){
		alert('Du gewinnst!');
		disableAlleFelder('Gewonnen!');
		//throw { name: 'FatalError', message: 'Something went badly wrong' };
		return false;
	}
	//Verloren
	if(sieger == 2){
		alert('Verloren...');
		disableAlleFelder();
		//throw { name: 'FatalError', message: 'Something went badly wrong' };
		return false;
	}
}

function zuegeMoeglich(){
	var arr = [];
	var id = '';
	
	for (i = 1; i <= 3; i++) {
		for (j = 1; j <= 3; j++) {
		
			id = '' + i + j;
		
			if($('#' + id).hasClass('kreuz') || $('#' + id).hasClass('kreis')){
			 continue;
			 } else {
				arr.push(i + '' + j);
			 }
		}
	}
	
	return arr;
}