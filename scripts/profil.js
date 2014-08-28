$(function() {
	$('#profil').click(function () {
					$.ajax('profil.php')
						.done(function (data) { 
							$('#divProfil')
								.empty()
								.append(data)
								.slideDown();
							$('#divMain').hide();
							$('#divAllianz').hide();
							$('#divGame').hide();
							$('#divMail').hide();
							$('#divRanking').hide();
							$('#divShop').hide();
							
							$('#changeDescBtn').click(function () {
										$.post('profil.php', {changeDesc:$('#changeDescField').val()}, function (data) {
												if (data == 'success') {
													alert('Erfolgreich gespeichert.');
												}
											});		
							});
						});
				});
				
	
});