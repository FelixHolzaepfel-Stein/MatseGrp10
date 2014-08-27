$(function() {
	$('#main').click(function () {
					$.ajax('main.php')
						.done(function (data) { 
							$('#content')
								.empty()
								.append(data);
						});
				});
});