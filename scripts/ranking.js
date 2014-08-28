$(function() {
	$('#ranking').click(function () {

					
					$.get('ranking.php', { recordsLoaded : 0 , upperBound: 1 }, function(data){ 

						//alert(data);
						$('#divRanking').hide();
						$('#divRanking').html(data);
						$('#divMain').hide();
						$('#divProfil').hide();
						$('#divMail').hide();
						$('#divShop').hide();
						$('#divAllianz').hide();
						$('td.description').hide();
						$('#divRanking').slideDown();

						 

						$('#rankingTable tr').hover(
						function()
						{
							
							$('#'+$(this).attr('id')+' td.description').fadeIn();
						},
						
						 function()
						 {
						 	$('#'+$(this).attr('id')+' td.description').fadeOut();
						 });

					});



				});




});