$(function() {

	$('#divMain').hide();
	$('#divAllianz').hide();
	$('#divGame').hide();
	$('#divMail').hide();
	$('#divProfil').hide();
	$('#divRanking').hide();
	$('#divShop').hide();
	
	$('#main').click(function () {
					$.ajax('main.php')	
						.done(function (data) { 
							$('#divMain')
								.empty()
								.append(data)
								.show();
							$('#divAllianz').hide();
							$('#divGame').hide();
							$('#divMail').hide();
							$('#divProfil').hide();
							$('#divRanking').hide();
							$('#divShop').hide();
						});
				});
});