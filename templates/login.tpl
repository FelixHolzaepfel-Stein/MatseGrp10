
<!DOCTYPE html>
<html>

<head>
<title>:: TicTacToe Online - Login::</title>
<link rel="stylesheet" type="text/css" href="../templates/stylesheet.css">
<script src="../scripts/jquery.js"></script>
<script src="../scripts/login.js"></script>
</head>



 <body>

<!-- beginn wrapper -->
<div id="wrp">

<div class="headline">TicTacToe Online</div>


<div id="login">
  <h1>Einloggen</h1>
  <form action="login.php" method="post" id="submfrm">
    <input name="Input" type="text" placeholder="Benutzername/Email" id="txtlogininput"/>
	<input name="tmp" type="hidden" value=1/>
    <input name="Password" type="password" placeholder="Passwort" id="txtpassword"/>
    <input name="login" type="submit" value="Log in" />
    <a href="register.php" id="registrieren">Registrieren</a> |
    <a href="#register" id="pwvergessen">Passwort vergessen?</a>
  </form>
</div>
<div class="error">{$error}</div>
</div>

<!-- ende wrapper -->


 </body>

</html>