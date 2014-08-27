<?php

require('../lib/Ranking.class.php');


$lowerBound= ($_GET['recordsLoaded'])*10;
$upperBound= $_GET['upperBound']*10;

echo Ranking::fetchRanking($lowerBound, $upperBound);






?>

