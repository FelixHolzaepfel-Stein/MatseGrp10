<?php
require('../lib/User.class.php');
require ('../lib/Database.class.php');

session_start();

if(isset($_POST['buy'])) {
	//Kauf entnehmen und abspeichern
	$buyPoints = $_POST['buy'];
	$id = $_SESSION['id'];
	$points = User::getPointsByID($id);
	$result = User::changePoints($id, $points+$buyPoints);
	if ($result) {
		unset($_POST['buy']);
		echo 'success';
		return;
	}
} else {
	//Ansicht erstellen
	$returnHtml = '<form id="buyForm">';
	$returnHtml .= '<p><h1>Shop</h1></p><br>';
	$returnHtml .= '<p><input type="radio" id="10p" name="buyP">10 Punkte - 3&euro;</p><br>';
	$returnHtml .= '<p><input type="radio" id="20p" name="buyP">20 Punkte - 5&euro;</p><br>';
	$returnHtml .= '<p><input type="radio" id="50p" name="buyP">50 Punkte - 10&euro;</p><br>';
	$returnHtml .= '<p>Bitte waehlen Sie Ihre Zahlungsweise</p><p><select name="zahlung">';
	$returnHtml .= '<option>Pay Pal</option>';
	$returnHtml .= '<option>Kreditkarte</option>';
	$returnHtml .= '<option>Bitcoin</option>';
	$returnHtml .= '</select></p><br>';
	$returnHtml .= '<p><input type="button" class="shopButton" id="buyBtn" value="Kaufen"></p><br>';
	$returnHtml .= '</form>';
	
	echo $returnHtml;	
	
}


?>