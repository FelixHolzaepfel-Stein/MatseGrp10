$(function() {
	$('#allianz').click(function () {
					$.ajax('allianz.php')
						.done(function (data) { 
							$('#divAllianz')
								.empty()
								.append(data);
							$('#divMain').hide();
							$('#divGame').hide();
							$('#divMail').hide();
							$('#divProfil').hide();
							$('#divRanking').hide();
							$('#divShop').hide();
						});
				});
});