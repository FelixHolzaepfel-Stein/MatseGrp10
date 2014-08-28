<?php


require("Database.class.php");

class Ranking
{
	
	 

	public static function fetchRanking($lowerBound, $upperBound)
	{
		$db= Database::getInstance();
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
		$statement = $db->prepare("Select * from benutzer ORDER BY points DESC LIMIT :lowerBound, :upperBound;");

		//Assign nicht vergesen !!!!
		$statement->bindParam(":lowerBound", $lowerBound, PDO::PARAM_INT);
		$statement->bindParam(":upperBound", $upperBound, PDO::PARAM_INT);
		$statement->execute();



		$returnHtml = "<table>";
		$returnHtml .= "<thead>";
		$returnHtml .= "<tr>";
		$returnHtml .= "<th>Name</th><th>Punktzahl</th>";
		$returnHtml .= "</tr>";
		$returnHtml .= "</thead>";
		$returnHtml .= "<tbody id='rankingTable'>";

		$recordAmountPerPage = 10;
		$count = $lowerBound+1;

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{	

			
			$pageNumber = $count % $recordAmountPerPage;
			$returnHtml .= "<tr id='".$row['ID']."'><td class='".$pageNumber." '>".$row['Name']."</td><td>".$row['Points']."</td><td class='description'>".$row['Description']."</td></tr>";
			$count++;
		}

		$returnHtml .= "</tbody>";
		$returnHtml .= "</table>";
		return $returnHtml;

			}
	}


