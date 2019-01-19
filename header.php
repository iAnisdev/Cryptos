<?php
  // Session has to start in order for variables to be saved globally as session.
  session_start();
  // the script requires the file in order to continue running correctly.
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Cryptos</title>
    <link rel="icon" href="img/core-img/logo.png" type="image/png"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    </head>
  <body>

    <!-- This is a basic header classes link to the stylesheet and href are direct links to the other pages in the folder -->
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
  <img src="img/core-img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Cryptos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php
        if (isset($_SESSION['id'])) {
        echo '<li class="nav-item active">
                <a class="nav-link" href="home.php">Portfolio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About me</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>';
        }
        ?>
    </ul>
    <div class="form-inline my-2 my-lg-0">
    <?php
        if (!isset($_SESSION['id'])) {
          echo '<form action="includes/login.inc.php" method="post">
            <input type="text"  class="form-control mr-sm-2" name="mailuid" placeholder="E-mail/Username">
            <input type="password"  class="form-control mr-sm-2" name="pwd" placeholder="Password">
            <button type="submit" class="btn btn-success my-2 my-sm-0" name="login-submit">Login</button>
          </form>
          <div style="margin-left: 0.5vw;"><a href="signup.php" class="btn btn-info my-2 my-sm-0">Signup</a></div>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit"  class="btn btn-danger my-2 my-sm-0" name="login-submit">Logout</button>
          </form>';
        }
        ?>
      </div>
  </div>
</nav>
</header>
