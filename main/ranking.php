<?php

require('../lib/Database.class.php');



const recordAmountPerPage = 10;

$lowerBound= ($_GET['recordsLoaded'])*10;
$upperBound= $_GET['upperBound']*10;

$db = new Database();

$statement = $db->prepare('Select * from user LIMIT :lowerBound, :upperBound ORDER BY points DESC';);

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
	id name email password description
	$pageNumber = $count % recordAmountPerPage;
	$returnHtml .= '<tr><td class="'.$pageNumber'">'.$row[name].'</td><td>'.$row[points].'</td><div id="'.$row[id].'</div></tr>';
	$count++;
}






?>

