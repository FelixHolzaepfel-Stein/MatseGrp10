$(function() {
	$('#profil').click(function () {
					$.ajax('profil.php')
						.done(function (data) { 
							$('#divProfil')
								.empty()
								.append(data);
							$('#divMain').hide();
							$('#divAllianz').hide();
							$('#divGame').hide();
							$('#divMail').hide();
							$('#divRanking').hide();
							$('#divShop').hide();
						});
				});
});