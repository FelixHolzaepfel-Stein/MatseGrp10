$(function () { 
	var anchor = window.location.hash;
	
	if (anchor == '#main') {
		$('#main').click();
	} else if (anchor == '#game') {
		$('#game').trigger('click');
	} else if (anchor == '#profil') {
		$('#profil').trigger('click');
	} else if (anchor == '#mail') {
		$('#mail').trigger('click');
	} else if (anchor == '#allianz') {
		$('#allianz').trigger('click');
	} else if (anchor == '#ranking') {
		$('#ranking').trigger('click');
	} else if (anchor == '#shop') {
		$('#shop').trigger('click');
	} else {
		$('#main').trigger('click');
	}
	
});