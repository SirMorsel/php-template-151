<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Passwort Vergessen</title>
    <?php include ("imports.php"); ?>
  </head>
  <body>

<div class="pwdResetBox box_round">
  <h2>Passwort zurücksetzten</h2>
    <form action="" method="post">
      <input type="text" name="emailForPwdReset" class="tb_btn_login_size box_round" placeholder="E-Mail..."/>
    </br></br>
      <input type="submit" class="btn btn-warning tb_btn_login_size" name="PwdReset" value="Passwort Vergessen"/>
    </form>
  </br>
    <a href="/login"><button name="backToLoginFrompwdForgot" class="btn btn-primary tb_btn_login_size">Zurück</button></a>
</div>
  </body>
</html>
