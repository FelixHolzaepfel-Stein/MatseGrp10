$(function() {
	$('#profil').click(function () {
					$.ajax('profil.php')
						.done(function (data) { 
							$('#content')
								.empty()
								.append(data);
						});
				});
});