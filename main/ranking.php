<?php

require('../lib/Ranking.class.php');



if(isset($_GET['recordsLoaded']) && isset($_GET['upperBound'])){

$lowerBound= ((int)$_GET['recordsLoaded'])*10;

$upperBound= ((int)$_GET['upperBound'])*10;

#echo($upperBound);

echo Ranking::fetchRanking($lowerBound, $upperBound);

}
else
{
	return;
}






?>