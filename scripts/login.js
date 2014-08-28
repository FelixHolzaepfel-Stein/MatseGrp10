$(function() {
	$('#submfrm').submit(function(){
		if($('#txtlogininput').val() && $('#txtpassword').val()){
			return true;
		}else{
			alert('Es muss ein Login und ein Passwort eingeben werden');
			return false;
		}
	});
});