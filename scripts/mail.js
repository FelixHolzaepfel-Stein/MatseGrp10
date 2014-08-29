$(function() {
	$('#mail').click(function () {
					$.ajax('mail.php')
						.done(function (data) {
							var res = ''+ data.substr(0, data.indexOf('<'));
							var html = data.substr(data.indexOf('<'));
							$('#divMail')
								.empty()
								.append(html)
								.show();
							$('#divMain').hide();	
							$('#divAllianz').hide();
							$('#divProfil').hide();
							$('#divRanking').hide();
							$('#divShop').hide();

							for( i=0;i<res;i++){
								(function(innerI){
									$('#mail'+innerI).click(function(){
										$.post('mail.php',{open:1,mailid:innerI}, function(data){
											$('#divMail')
											.empty()
											.append(data)
											.show();
											$('#BackBtn').click(function(){
												$('#mail').trigger('click');
											});
										});
									});
								})(i);
							}
							
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