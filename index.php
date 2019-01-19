<?php
  // this imports the header folder instead of re writing out the header code on every page it can be stored in one place and then moved
  require "header.php";
?>

    <main>
      <div class="container">
        <section class="main">
          <!--
           can choose whether or not to show ANY content on our pages depending on if the user is logged in or not.
          -->
          <?php
          if (!isset($_SESSION['id'])) {
            echo '<div class="text-center"><div class="alert alert-danger"  style="width: 25rem;" role="alert">
            You are logged out!
          </div></div>';
          }
          else if (isset($_SESSION['id'])) {
            echo '<div class="text-center"><div class="alert alert-success text-center"  style="width: 25rem;"  role="alert">
            Welcome to your Crypto Account</div>
            </div>';
          }
          ?>
        </section>
      </div>
    </main>

<?php
  // footer is incluuded for same reason as header .
  require "footer.php";
?>
