<?php
require('../lib/Database.class.php');
require('../lib/User.class.php');

session_start();

if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];	
	
	if (isset($_POST['changeDesc'])) {
		$newDesc = $_POST['changeDesc'];
		$result = User::changeDescription($id, $newDesc);
		if ($result) {
			echo 'success';
			return;
		}
	} else {
		$name = User::getNameByID($id);
		$mail = User::getEmailByID($id);
		$points = User::getPointsByID($id);
		$description = User::getDescriptionByID($id);
	
		$returnHtml = '<table>';
		$returnHtml .= '<tr><td>Benutzername: </td><td>' . $name . '</td></tr>';
		$returnHtml .= '<tr><td>E-Mail: </td><td>' . $mail . '</td></tr>';
		$returnHtml .= '<tr><td>Punkte: </td><td>' . $points . '</td></tr>';
		$returnHtml .= '<tr><td>Beschreibung: </td><td><textarea id="changeDescField" name="changeDescField" cols="30" rows="3" wrap="hard">'.$description.'</textarea></td></tr>';
		$returnHtml .= '</table>';
		$returnHtml .= '<input type="button" class="profilButton" id="changeDescBtn" value="Speichern">';
	}
} else {
	$returnHtml = '<p>Es ist kein Spieler eingeloggt!</p>';
}

echo $returnHtml;
?>