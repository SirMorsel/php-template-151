<?php
//session_start();
 ?>
<!Doctype>
<html>
<head>
<title>Login Page</title>
<link href="stylesheets/loginContent.css" rel="stylesheet" type="text/css" media="all">
<body>
<h1>Login</h1>

	<form action="" method="POST">
		<label>
		Email:
			<input type="email" name="email"  value="<?= (isset($email)) ? htmlspecialchars($email) : "" ?>"/>
	</label>
	<label>
	Passwort:
			<input type="password" name="password"/>
	</label>
			<input class="btn btn-primary" type="submit" name="login" value="Login"/>
		</form>

    <form  action="" method="POST">
      <input class="btn btn-primary" type="submit" name="goToReg" value="Registrieren"/>
    </form>
</body>
</head>


</html>

<?php
if (isset($_POST['goToReg'])) {
  header('Location: /registrieren');
}
 ?>
