<?php
// check whether the user got to this page by clicking the proper login button or if the page was accessed in a different way .
if (isset($_POST['login-submit'])) {

  require 'dbh.inc.php';

  // collect the data which was passed from the signup form so it can be used  later.
  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];


  //  check for any empty inputs.
  if (empty($mailuid) || empty($password)) {
    header("Location: ../index.php?error=emptyfields&mailuid=".$mailuid);
    exit();
  }
  else {



    //  get the password from the user in the database that has the same username as what the user typed in, and then de-hash it and check if it matches the password the user typed into the login form.

    //  connect to the database using prepared statements which work by us sending SQL to the database first, and then later can fill in the placeholders by sending the users data.
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
    // initializes a new statement using the connection from the dbh.inc.php file.
    $stmt = mysqli_stmt_init($conn);
    //  prepares the SQL statement AND checks if there are any errors with it.
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // If there is an error it sends the user back to the signup page.
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {


      //  bind the type of parameters that need  to pass into the statement, and bind the data from the user.
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      //  execute the prepared statement and send it to the database
      mysqli_stmt_execute($stmt);
      //  get the result from the statement.
      $result = mysqli_stmt_get_result($stmt);
      //  store the result into a variable.
      if ($row = mysqli_fetch_assoc($result)) {
        //  match the password from the database with the password the user submitted. The result is returned as a boolean.
        $pwdCheck = password_verify($password, $row['pwdUsers']);
        // If they don't match then  create an error message
        if ($pwdCheck == false) {
          // If there is an error the user is sent back to the signup page.
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }
        //  if they match, then it is the correct user that is trying to log in
        else if ($pwdCheck == true) {

          //  create session variables based on the users information from the database. If these session variables exist, then the website will know that the user is logged in.

          // need to store data in session variables which are a type of variable that can be used on all pages that has a session running in it.

          session_start();
          //  create the session variables.
          $_SESSION['id'] = $row['idUsers'];
          $_SESSION['uid'] = $row['uidUsers'];
          $_SESSION['email'] = $row['emailUsers'];
          //  user is registered as logged in and  can now take them back to the front page
          header("Location: ../index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../index.php?login=wronguidpwd");
        exit();
      }
    }
  }
  // close the prepared statement and the database connection
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../signup.php");
  exit();
}
