<!DOCTYPE html>
<html>

<head>
<title>:: TicTacToe Online ::</title>
<link rel="stylesheet" type="text/css" href="../templates/stylesheet.css">

    <script src="../scripts/jquery.js"></script>
    <script src="../scripts/main.js"></script>
    <script src="../scripts/game.js"></script>
    <script src="../scripts/profil.js"></script>
    <script src="../scripts/mail.js"></script>
    <script src="../scripts/allianz.js"></script>
    <script src="../scripts/ranking.js"></script>
    <script src="../scripts/shop.js"></script>
	
</head>




<body>

<!-- beginn wrapper -->
<div id="wrp">

<!-- header beginn -->
<header>


<!-- navi beginn -->
<nav ul>
         <li><span id="main">Startseite</span></li>
         <li><span id="game">Neues Spiel</span></li>
         <li><span id="profil">Profil</span></li>
         <li><span id="mail">Nachrichten</span></li>
         <li><span id="allianz">Allianz</span></li>
         <li><span id="ranking">Bestenliste</span></li>
         <li><span id="shop">Shop</span></li>
		 <li><a href="logout.php">Abmelden</span></li>
</nav>
<!-- navi ende -->



</header>
<!-- header ende -->


<!-- content beginn -->
<section id="content">
	<div id="divMain"></div>
		
	<div id="divGame"></div>
		
	<div id="divProfil"></div>
		
	<div id="divMail"></div>
		
	<div id="divAllianz"></div>
		
	<div id="divRanking">
		<table>
		<thead>
		<tr>
		<thead>Name</thead>
		<thead>Punkte</thead>
		</tr>
		</thead>
		<tbody id="rankingTable">
		</tbody>
		</table>


		<div id="divInnerRanking">
				<a id="backButton" href=""><</a>
				<p id="pageNumber">1<p>
				<a id="nextButton" href="">></a>
		</div>
	</div>
	
	<div id="divShop"></div>
	
</section>
<!-- content ende -->



<!-- footer beginn -->
<footer>
Name 1 | Name 2 | Name 3
</footer>
<!-- footer ende -->


</div>
<!-- ende wrapper -->



</body>









</html>