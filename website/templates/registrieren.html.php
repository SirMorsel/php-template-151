<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
<h1>Registrieren</h1>

    <form class="" action="" method="post">
      <input type="text" name="usernameReg" placeholder="Username..."/></br>
      <input type="email" name="emailReg" placeholder="EMail..."/></br>
      <input type="password" name="pwdReg" placeholder="Passwort..."/></br>
      <input type="password" name="pwdRegBest" placeholder="Passwort bestätigen..."/></br>
      <input type="submit" name="registrieren" value="Registrieren"/>
      <button name="backRegToLog" value="0">Zurück</button>
    </form>

  </body>
</html>

<?php
if (isset($_POST['backRegToLog']))
{
  $_POST['backRegToLog'] =1;
  header('Location: /login');
}

if (isset($_POST['registrieren'])) {
header('Location: /login');
}
?>
