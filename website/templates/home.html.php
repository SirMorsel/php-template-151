<?php
session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Forum</title>

  </head>
  <body>
    <h1>Forum</h1><div class="headerGreeting"> Hallo:<?php echo $_SESSION["email"]; ?></div>
    <?php include ("imports.php");/*Für Testzwecke*/ ?>
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

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="/forum">Forum <span class="sr-only">(current)</span></a></li> index.php?site=Forum
              <li><a href="#/Profil">Profil</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategorie <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Kategorie 1</a></li>
                  <li><a href="#">Kategorie 2</a></li>
                  <li><a href="#">Kategorie 3</a></li>
                  <li><a href="#">Kategorie 4</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-left">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-warning">Suche</button>
            </form>

            <form class="navbar-form navbar-right" method="post" action="/login">

              <input type="submit" class="btn btn-danger" name="btnLogout" value="Logout"/>
            </form>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

<?php
      if(isset($_GET["site"]))
      {
        $site = $_GET['site'];
      }
      else
      {
        $site = "home";
      }

      require_once($site.".php");
      echo "<article>";
      echo "<h1>" . $section_title . "</h1>";
      echo $content;
      echo "</article>";
?>

  </body>
</html>

<?php
if (isset($_POST['btnLogout']))
  {
    echo "Sie sind nun ausgelogt";
    session_destroy();
  }
 ?>
