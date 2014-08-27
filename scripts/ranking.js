$(function() {
	$('#ranking').click(function () {
					$.ajax('ranking.php')
						.done(function (data) { 
							$('#divRanking')
								.empty()
								.append(data);
							$('#divMain').hide();
							$('#divAllianz').hide();
							$('#divGame').hide();
							$('#divMail').hide();
							$('#divProfil').hide();
							$('#divShop').hide();
						});
				});
});