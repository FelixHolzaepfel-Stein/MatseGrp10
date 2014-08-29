<?php
require '../lib/Database.class.php';
require '../lib/User.class.php';

session_start();

if (isset($_POST['newMail'])) {
	//Nachricht senden
	$returnHtml = '<h1>Neue Nachricht</h1>';
	$returnHtml .= '<p><input id="newMailSendBtn" class="profilButton" type="button" value="Senden"></p>';
	$returnHtml .= '<table border=0><br>';
	$returnHtml .= '<tr><td>An: </td><td><input type="text" id="an"></td><br>';
	$returnHtml .= '<tr><td>Betreff: </td><td><input type="text" id="betreff"></td><br>';
	$returnHtml .= '<tr><td>Inhalt: </td><td><textarea id="nachricht" cols="30" rows="15"wrap="soft"></textarea></td><br>';
	$returnHtml .= '</table>';
	
	unset($_POST['newMail']);
	echo $returnHtml;
} else if(isset($_POST['send'])) { 
	//Nachricht senden
	$id = $_SESSION['id'];
	$to = $_POST['to'];
	$title = $_POST['title'];
	$text = $_POST['inhalt'];
	
	$result = User::sendMail($id, $to, $title, $text);
	if ($result) {
		unset($_POST['send']);
		echo 'success';
	}
	
} else if(isset($_POST['open'])) { 
	//Nachricht öffnen
} else {
	//Seite laden
	$id = $_SESSION['id'];
	$mails = User::getMailsByID($id);
	$returnHtml = '<input id="newMailBtn" class="profilButton" type="button" value="Neue Nachricht schreiben"><br>';
	$returnHtml .= '<table class="rankingTable">';
	$returnHtml .= '<tr><td>Von</td><td>An</td><td>Betreff</td></tr><br>';
	
	$countMails = count($mails); 
	
	for ($i = 0; $i < $countMails; $i++) {
		$returnHtml .= '<tr><td id="mail' . $i . '">'. User::getNameByID($mails[$i]['From_ID']) . '</td><td> ' . User::getNameByID($mails[$i]['To_ID']) . '</td><td>'. $mails[$i]['Title'] . '</td></tr><br>';
	}
	$returnHtml .= '</table>';
	
	echo $returnHtml;
}


?>