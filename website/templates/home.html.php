<?php

$timestamp = time();
$time = date("d.m.Y H:i ", $timestamp);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Forum</title>

  </head>
  <body>
    <h1>Forum</h1>
  </br>
    <div class="headerGreeting">
    </br></br></br>
      Hallo:<?php //echo $_SESSION["email"]; ?></div>
    <?php include ("imports.php"); ?>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Home</a>
          </div>
            <form class="navbar-form navbar-right" method="post" action="/login">
              <input type="submit" class="btn btn-danger" name="btnLogout" value="Logout"/>
            </form>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

<div class="postForm box_round">
  <b class="titlepost">Verfassen Sie Ihren Post!</b>
    <form action="" method="post">
      <input type="text" name="titlePost" value="" placeholder="Titel..." class="tb_Title"/>
    </br></br>
      <textarea name="contentPost" class="box_round" placeholder="Inhalt..."></textarea>
    </br>
      <input type="submit" class="btn btn-warning btn_Width_Medium" name="sendPost" value="Posten"/>
    </form>
</div>

<div class="postContainer box_round">
  <h3 class="titlepost">Forum</h3>
  <hr>
<?php
  //echo $time;
  echo $showposts;
?>
</div>

<footer class="box_round">© SirMorsel</footer>
  </body>
</html>

<?php
if (isset($_POST['btnLogout']))
  {
    echo "Sie sind nun ausgelogt";
    session_destroy();
  }

 ?>
