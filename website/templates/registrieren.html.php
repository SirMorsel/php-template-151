<?php
    include ("imports.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>


<div class="registrierenBox box_round">
  <h2>Registrieren</h2>
    <form class="" action="" method="post">
      <input type="text" name="usernameReg" class="tb_btn_registrieren_size box_round" placeholder="Username..."/></br></br>
      <input type="email" name="emailReg" class="tb_btn_registrieren_size box_round" placeholder="EMail..."/></br></br>
      <input type="password" name="pwdReg" class="tb_btn_registrieren_size box_round" placeholder="Passwort..."/></br></br>
      <input type="password" name="pwdRegBest" class="tb_btn_registrieren_size box_round" placeholder="Passwort bestätigen..."/></br></br>
      <input type="submit" class="btn btn-success btn_color_black" name="registrieren" value="Registrieren"/>
    </form>
    <a href="/login"><button name="backRegToLog" class="btn btn-primary btn_color_black" value="0">Zurück</button></a>
</div>
  </body>
</html>

<?php
if (isset($_POST['registrieren']))
{
  header('Location: /login');
}
?>
