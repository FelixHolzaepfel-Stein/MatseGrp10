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
    <script src="../scripts/ranking.js"></script>
    <script src="../scripts/shop.js"></script>
    <script src="../scripts/anchor.js"></script>
	
</head>




<body>

<!-- beginn wrapper -->
<div id="wrp">

<!-- header beginn -->
<header>


<!-- navi beginn -->
<nav ul>
         <li><a href="#main" id="main">Startseite</a></li>
         <li><a href="#game" id="game">Neues Spiel</a></li>
         <li><a href="#profil" id="profil">Profil</a></li>
         <li><a href="#mail" id="mail">Nachrichten</a></li>
         <li><a href="#ranking" id="ranking">Bestenliste</a></li>
         <li><a href="#shop" id="shop">Shop</a></li>
		 <li><a href="logout.php">Abmelden</a></li>
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
		
		
	<div id="divRanking">
		<table class="rankingTable">
		<tr>
		<th>Name</th>
		<th>Punkte</th>
		<th>Beschreibung</th>
		</tr>
		<tbody id="rankingTable">
		</tbody>
		</table>


		<div id="divInnerRanking">
				<span id="backButton" ><</span>
				<span id="pageNumber">1</span>
				<span id="nextButton" >><span>
		</div>
	</div>
	
	<div id="divShop"></div>
	
</section>
<!-- content ende -->



<!-- footer beginn -->
<footer>
Mona Scholl | Niklas Roth | Felix Holzaepfel-Stein | Andreas Trautwein | Enes Hoyladi
</footer>
<!-- footer ende -->


</div>
<!-- ende wrapper -->



</body>









</html>