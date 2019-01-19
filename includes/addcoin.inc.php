
<?php
require 'dbh.inc.php';

//  check whether the user got to this page by clicking the proper add-coin button.

if (isset($_POST['add-coin']))
	{

	//  include the connection script so can use it later.
	//  grab all the data which was passed from the addcoin form so it can be used  later.

	echo $btc = $_POST['btcqt'];
	echo $eth = $_POST['ethqt'];
	echo $mon = $_POST['monqt'];
	echo $ltc = $_POST['ltcqt'];
	echo $rpp = $_POST['rppqt'];

	// error handling
	//  check for any empty inputs.

	if ($btc < 0 || $eth < 0 || $mon < 0 || $ltc < 0 || $rpp < 0)
		{

		// javascript alert

		echo "<script>
        window.location.href='../home.php?error=emptyInput';
        alert('All fields required');
        </script>";
		exit();
		}
	  else
		{
		session_start();
		if (isset($_SESSION['id']))
			{
			$uid = $_SESSION['id'];
			$sql = "INSERT INTO  coinbase 
        VALUES ('',$uid,$btc , $eth , $mon , $ltc , $rpp)";
			if (mysqli_query($conn, $sql))
				{
				echo "<script>
          window.location.href='../home.php';
          </script>";
				}
			  else
				{
				echo "Error: " . $sql . "<br />" . mysqli_error($conn);
				}
			}
		  else
			{

			// if user is not logged in will redirect to index

			header("Location: ../index.php");
			exit();
			}
		}

	// Then we close the prepared statement and the database connection!
	// mysqli_stmt_close($stmt);

	mysqli_close($conn);
	}
