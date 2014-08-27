$(function() {
	$('#mail').click(function () {
					$.ajax('mail.php')
						.done(function (data) { 
							$('#content')
								.empty()
								.append(data);
						});
				});
});