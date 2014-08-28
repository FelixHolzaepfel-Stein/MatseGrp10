$(function() {
	$('#submfrm').submit(function(){
		if($('#name').val() !== '' && $('#email').val() !== '' && $('#pw1').val() !== '' && $('#pw2').val() !== ''){
			return true;
		}else{
			alert('Alle Pflichtfelder muessen gefuellt sein!');
			return false;
		}
	});
});