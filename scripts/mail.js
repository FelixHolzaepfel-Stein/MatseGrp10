$(function() {
	$('#mail').click(function () {
					$.ajax('mail.php')
						.done(function (data) { 
							$('#divMail')
								.empty()
								.append(data);
							$('#divMain').hide();	
							$('#divAllianz').hide();
							$('#divMail').hide();
							$('#divProfil').hide();
							$('#divRanking').hide();
							$('#divShop').hide();
						});
				});
});