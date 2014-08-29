$(function() {
	$('#shop').click(function () {
					$.ajax('shop.php')
						.done(function (data) { 
							$('#divShop')
								.empty()
								.append(data)
								.show();
							$('#divMain').hide();
							$('#divAllianz').hide();
							$('#divGame').hide();
							$('#divMail').hide();
							$('#divProfil').hide();
							$('#divRanking').hide();
							
							$('#buyBtn').click(function () {
											if (!$('#10p').val() && !$('#20p').val() && !$('#50p').val()) {
												alert('Sie muessen einen Kauf auswaehlen!');
											} else {
												var buyPoints;
												if ($('#10p').val()) {
													buyPoints = 10;
												}else if ($('#20p').val()) {
													buyPoints = 20;
												} else if ($('#50p').val()) {
													buyPoints = 50;
												}
												$.post('shop.php', {buy:buyPoints}, function(data) {
													if (data == 'success') {
														alert('Kauf war erfolgreich!');
													}
												});
											}
							});
						});
				});
});