$(function() {
	$('#mail').click(function () {
					$.ajax('mail.php')
						.done(function (data) {
							$('#divMail')
								.empty()
								.append(data)
								.show();
							$('#divMain').hide();	
							$('#divAllianz').hide();
							$('#divProfil').hide();
							$('#divRanking').hide();
							$('#divShop').hide();
							
							$('#newMailBtn').click(function () {
								$.post('mail.php', {newMail:1}, function(data) {
									$('#divMail')
										.empty()
										.append(data)
										.show();
									
									$('#newMailSendBtn').click(function () {
										$.post('mail.php', {send:1, to:$('#an').val(), title:$('#betreff').val(), inhalt:$('#nachricht').val()}, function(data) {
											if (data=='success') {
												$('#mail').trigger('click');
											}
										});
									});
								});
							});
						});
				});
});