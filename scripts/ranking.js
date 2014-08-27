$(function() {
	$('#ranking').click(function () {
					$.ajax('ranking.php')
						.done(function (data) { 
							$('#content')
								.empty()
								.append(data);
						});
				});
});