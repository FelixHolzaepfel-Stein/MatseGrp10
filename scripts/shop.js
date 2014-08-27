$(function() {
	$('#shop').click(function () {
					$.ajax('shop.php')
						.done(function (data) { 
							$('#content')
								.empty()
								.append(data);
						});
				});
});