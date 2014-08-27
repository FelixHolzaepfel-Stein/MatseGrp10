$(function() {
	$('#game').click(function () {
					$.ajax('game.php')
						.done(function (data) { 
							$('#divGame')
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