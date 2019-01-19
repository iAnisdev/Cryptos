<?php
  // this imports the header folder instead of re writing out the header code on every page it can be stored in one place and then moved
  require "header.php";
?>
<div class="container main">
<div class="card-deck">
  <div class="card" style="width: 20rem;">
    <div class="card-body">
    <?php
          //  creates an error message if the user made an error trying to sign up.
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
              echo '<div class="alert alert-danger" role="alert">Fill in all fields!</div>';
            }
            else if ($_GET["error"] == "invaliduidmail") {
              echo '<div class="alert alert-danger" role="alert">Invalid username and e-mail!</div>';
            }
            else if ($_GET["error"] == "invaliduid") {
              echo '<div class="alert alert-danger" role="alert">Invalid username!</div>';
            }
            else if ($_GET["error"] == "invalidmail") {
              echo '<div class="alert alert-danger" role="alert">Invalid e-mail!</div>';
            }
            else if ($_GET["error"] == "passwordcheck") {
              echo '<div class="alert alert-danger" role="alert">Your passwords do not match!</div>';
            }
            else if ($_GET["error"] == "usertaken") {
              echo '<div class="alert alert-danger" role="alert">Username is already taken!</div>';
            }
          }
          //  create a success message if the new user was created.
          else if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
              echo '<div class="alert alert-success" role="alert">Signup successful!</div>';
            }
          }
          ?>
        <form class="form-signup" action="includes/signup.inc.php" method="post">
        <?php
            // check if the user already tried submitting data.

            //  check username.
            if (!empty($_GET["uid"])) {
              echo '<div class="form-group"><label for="username">Username</label><input type="text" class="form-control" name="uid" placeholder="Username" value="'.$_GET["uid"].'"></div>';
            }
            else {
              echo '<div class="form-group"><label for="username">Username</label><input type="text" class="form-control" name="uid" placeholder="Username"></div>';
            }

            //  check e-mail.
            if (!empty($_GET["mail"])) {
              echo '<div class="form-group"><label for="email">Email address</label><input type="email" name="mail" class="form-control" placeholder="E-mail" value="'.$_GET["mail"].'"></div>';
            }
            else {
              echo '<div class="form-group"><label for="email">Email address</label><input type="email" class="form-control" name="mail" placeholder="E-mail"></div>';
            }
            ?>
         <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="pwd" placeholder="Password">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Repeat Password</label>
                      <input type="password" class="form-control" name="pwd-repeat" placeholder="Password">
                  </div>
                  <button type="submit"  name="signup-submit" class="btn btn-success btn-block">Submit</button>
                  </form>
  </div>

</div>
<?php
  // same as header.
  require "footer.php";
?>
