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
	$returnHtml = '<h3>Nachrichten</h3><br>';
	$returnHtml .= '<ul><br>';
	
	$countMails = count($mails); 
	
	for ($i = 0; $i < $countMails; $i++) {
		$returnHtml .= '<li id="mail' . $i . '">'. User::getNameByID($mails[$i]['From_ID']) . ' - ' . User::getNameByID($mails[$i]['To_ID']) . ': '. $mails[$i]['Title'] . '</li><br>';
	}
	$returnHtml .= '</ul>';
	$returnHtml .= '<input id="newMailBtn" class="profilButton" type="button" value="Neue Nachricht schreiben"><br>';
	
	echo $returnHtml;
}


?>