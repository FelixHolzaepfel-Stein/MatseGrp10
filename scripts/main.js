$(function() {
	$('#main').click(function () {
					$.ajax('main.php')
						.done(function (data) { 
							$('#divMain')
								.empty()
								.append(data);
							$('#divAllianz').hide();
							$('#divGame').hide();
							$('#divMail').hide();
							$('#divProfil').hide();
							$('#divRanking').hide();
							$('#divShop').hide();
						});
				});
});