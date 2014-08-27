$(function() {
	$('#game').click(function () {
					$.ajax('game.php')
						.done(function (data) { 
							$('#content')
								.empty()
								.append(data);
						});
				});
});