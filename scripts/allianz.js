$(function() {
	$('#allianz').click(function () {
					$.ajax('allianz.php')
						.done(function (data) { 
							$('#content')
								.empty()
								.append(data);
						});
				});
});