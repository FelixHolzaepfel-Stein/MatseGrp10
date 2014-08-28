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
	
	var htmlstring = '<table id="Feldtabelle"><tr>'
				   + '<td><input id="11" type="button" class="feldButton" onclick="besetzeFeld(11)" /></td>'
				   + '<td><input id="12" type="button" class="feldButton" onclick="besetzeFeld(12)" /></td>'
				   + '<td><input id="13" type="button" class="feldButton" onclick="besetzeFeld(13)" /></td>'
				   + '</tr><tr>'
				   + '<td><input id="21" type="button" class="feldButton" onclick="besetzeFeld(21)" /></td>'
				   + '<td><input id="22" type="button" class="feldButton" onclick="besetzeFeld(22)" /></td>'
				   + '<td><input id="23" type="button" class="feldButton" onclick="besetzeFeld(23)" /></td>'
				   + '</tr><tr>'
				   + '<td><input id="31" type="button" class="feldButton" onclick="besetzeFeld(31)" /></td>'
				   + '<td><input id="32" type="button" class="feldButton" onclick="besetzeFeld(32)" /></td>'
				   + '<td><input id="33" type="button" class="feldButton" onclick="besetzeFeld(33)" /></td>'
				   + '</tr></table>';
				   

	$('#spielfeld').html(htmlstring);		   
}

function besetzeFeld(id){
	$('#' + id).addClass('kreuz');
	$('#' + id).prop("disabled", true);
	zugDerKI();
}

function zugDerKI(){
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
	
	var zielfeld = arr[Math.floor((Math.random() * arr.length))];
	
	$('#' + zielfeld).addClass('kreis');
	$('#' + zielfeld).prop("disabled", true);
}