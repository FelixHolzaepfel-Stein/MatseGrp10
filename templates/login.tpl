<html> 
	<head>
		<link rel="stylesheet" type="text/css" href="../templates/stylesheet.css">
	</head>
	<body>
		<form action='login.php' method='post'>
			<table>
				<tr>
					<td class='loginLabel'>Benutzername/<br>E-Mail-Adresse:</td>
					<td><input name='Input' type='text' class='loginInput'></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input name="Password" type="password"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="tmp" value=1 ></td>
					<td>
						<input type="submit" value="Login" name="login" >
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<a href='register.php' id='registrieren'>Registrieren</a>
						<a href='#register' id='pwvergessen'>Passwort vergessen</a>
					</td>
					<td class='loginLabel'>Password:</td>
					<td><input name='Password' type='password' class='loginInput'></td>
				</tr>
			</table>
			<div id='controls'>
				<input type='submit' value='Einloggen' name='login' class='loginButton' >
				<a href='#register' id='registrieren'>Registrieren</a>
				<a href='#register' id='pwvergessen'>Passwort vergessen</a>
			</div>
		</form>
	</body>
</html>