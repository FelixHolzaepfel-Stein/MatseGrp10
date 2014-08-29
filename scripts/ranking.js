$(function() {
	$('#ranking').click(function () 
	{
					$('#pageNumber').html(1);
					
					$.get('ranking.php', { recordsLoaded : 0 , upperBound: 1 }, function(data){ 

						//alert(data);
						$('#divRanking').hide();
						$('#divGame').hide();
						$('#rankingTable').html(data);
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
	
	// Funktionen für das Paging
	
	(function ()
	{
		var pageNumber = parseInt($('#pageNumber').html());
	
		if(pageNumber === 1)
		{
			$('#backButton').hide();
		}
		
		$('#backButton').click(function(evt){
			
				var pageNumber = parseInt($('#pageNumber').html());
				
				$('.'+pageNumber).hide();
				$('.'+(pageNumber-1)).show();
				$('#pageNumber').html((--pageNumber));
				if(pageNumber === 1)
				{
					$('#backButton').hide();
				}
				
		
		});
		
		$('#nextButton').click(function(evt){
			
			var pageNumber = parseInt($('#pageNumber').html());
			var upperBound = pageNumber+1;
			if($('tr.'+ upperBound).length!== 0)
			{
				$('tr.'+pageNumber).hide();
				$('tr.'+(upperBound)).show();
				$('#backButton').show();
				$('#pageNumber').html(pageNumber+1);
				
			}
			else
			{
				$.get('ranking.php', {recordsLoaded : pageNumber , upperBound: upperBound}, function(data)
				{
					if(data === "" ||  data === " " || data == "  ")
					{
						return;
					}

					$('#rankingTable').append(data);
					
					$('#rankingTable tr').hover(
						function()
						{
							
							$('#'+$(this).attr('id')+' td.description').fadeIn();
						},
						
						 function()
						 {
						 	$('#'+$(this).attr('id')+' td.description').fadeOut();
						 });
					$('tr.'+pageNumber).hide();
				
					$('#pageNumber').html(upperBound);
					$('tr.'+(upperBound)).show();
					$('#backButton').show();
					
					
				});
			}
			
		
		
		
		});
	
	
	})();




});