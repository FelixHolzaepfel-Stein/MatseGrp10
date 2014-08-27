$(function() {
	$('#shop').click(function () {
					$.ajax('shop.php')
						.done(function (data) { 
							$('#divShop')
								.empty()
								.append(data);
							$('#divMain').hide();
							$('#divAllianz').hide();
							$('#divGame').hide();
							$('#divMail').hide();
							$('#divProfil').hide();
							$('#divRanking').hide();
						});
				});
});