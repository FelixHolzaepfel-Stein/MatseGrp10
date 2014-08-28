$(function() {
	$('#messages').hide();
	$('#submfrm').submit(function(){
		if($('#txtlogininput').val() && $('#txtpassword').val()){
			$('#messages').hide();
			return true;
		}else{
			$('#messages').empty().append('Es muss ein Login und ein Passwort eingeben werden');
			$('#messages').show();
			return false;
		}
	});
});