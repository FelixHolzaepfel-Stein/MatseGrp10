<html> 
	<head>
	</head>
	<body>
		<form action="login.php" method="post">
			<table>
				<tr>
					<td>Benutzername/<br/>E-Mail-Adresse:</td>
					<td><input name="Inputnput" type="text"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input name="Password" type="password"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="tmp" value=1 ></td>
					<td>
						<input type="submit" value="login" name="login" >
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<a href='#register' id='registrieren'>Registrieren</a>
						<a href='#register' id='pwvergessen'>Passwort vergessen</a>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>