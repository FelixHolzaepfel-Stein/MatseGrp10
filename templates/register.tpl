<html> 
<head>

</head>
<body>
	<form action="register_post.php" method="post" id="subm">
		Name:<input name="Name" type="text" id="name"><br>
		Email:<input name="Email" type="text" id="email"><br>
		Password:<input name="Password1" type="password" id="pw1"><br>
		Password wiederholen :<input name="Password2" type="password" id="pw2"><br>
		<input type="hidden" name="tmp" value=1 >
		<input type="submit" value="Registrieren" name="Register" id="btn" >
	</form>
	<div id="output"></div>
	
	<script src="scripts/jquery.js"></script>
	<script src="scripts/script.js"></script>
</body>
</html>