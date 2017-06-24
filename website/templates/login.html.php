<?php
    include ("imports.php");
?>
<!Doctype>
<html>
<head>
<title>Login Page</title>
<link href="stylesheets/loginContent.css" rel="stylesheet" type="text/css" media="all">
<body>


<div class="loginBox box_round">
  <h2>Login Forum</h2>
	<form action="" method="POST">
		<label>
			<input type="email" name="email" class="tb_btn_login_size box_round" placeholder="Email..."  value="<?= (isset($email)) ? htmlspecialchars($email) : "" ?>"/>
	</label>
</br>
	<label>
			<input type="password" class="tb_btn_login_size box_round" placeholder="Passwort..." name="password" />
	</label>
</br></br>
			<input class="btn btn-success tb_btn_login_size" type="submit" name="login" value="Login"/>
		</form>

    <form  action="" method="POST">
      <input class="btn btn-primary tb_btn_login_size" type="submit" name="goToReg" value="Registrieren"/>
    </form>
      <a href="/passwordReset"><button class="btn btn-warning tb_btn_login_size" type="submit" name="goToForgetPwd" value="">Passwort vergessen</button></a>
  </div>
</body>
</head>


</html>

<?php
if (isset($_POST['goToReg']))
{
  header('Location: /registrieren');
}
 ?>
