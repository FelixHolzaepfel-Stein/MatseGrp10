<!DOCTYPE html>
<html>

<head>
<title>:: TicTacToe Online - Login::</title>
<link rel="stylesheet" type="text/css" href="../templates/stylesheet.css">
<script src="../scripts/jquery.js"></script>
<script src="../scripts/register.js"></script>
</head>



 <body>

<!-- beginn wrapper -->
<div id="wrp">

<div class="headline">TicTacToe Online</div>


<div id="login">
  <h1>Bei TicTacToe Online registrieren</h1>
  <form action="register.php" method="post" id="submfrm">
    <input name="Name" type="text" id="name" placeholder="Benutzername" />
    <input name="Email" type="email" id="email" placeholder="E-mail" />
    <input name="Password1" type="password" id="pw1" placeholder="Passwort" />
    <input name="Password2" type="password" id="pw2" placeholder="Passwort wiederholen" />
    <input type="hidden" name="tmp" value=1 >
    <input type="submit" value="Registrieren" name="Register" id="btn" />
  </form>
</div>

<div id="output"></div>
<div class="error">{$error}</div>

</div>
<!-- ende wrapper -->

<script src="scripts/jquery.js"></script>
<script src="scripts/script.js"></script>

 </body>

</html>