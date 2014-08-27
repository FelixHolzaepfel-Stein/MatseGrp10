<?php


require('Database.class.php');

class Ranking
{
	
	static  $recordAmountsPerPage = 10;

	public static fetchRanking($lowerBound, $upperBound)
	{
		$db= Database::getInstance();
		$statement = $db->prepare('Select * from user LIMIT :lowerBound, :upperBound ORDER BY points DESC');

		//Assign nicht vergesen !!!!
		$statement->bindParam(':lowerBound', $lowerBound);
		$statemnet->bindParam(':upperBound', $upperBound);
		$statement->execute();



		$returnHtml = '<table>';
		$returnHtml .= '<tr>';
		$returnHtml .= '<th>Name</th><th>Punktzahl</th>';
		$returnHtml .= '<tr>';

		$count = $lowerBound+1;

		while($row = $statement->fetch())
		{
			
			$pageNumber = $count % self::$recordAmountPerPage;
			$returnHtml .= '<tr><td class="'.$pageNumber'">'.$row[name].'</td><td>'.$row[points].'</td><div id="'.$row[id].'</div></tr>';
			$count++;
		}

		return $returnHtml;

			}
	}


?>