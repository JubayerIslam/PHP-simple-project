
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<?php 
session_start();
?>
<?php require "header.php"; ?>

	<?php
		require ("mysqlconnect.php");
		if (isset($_SESSION["username"])) {
			echo "Welcome " . $_SESSION['username'];
	?>




	<?php 
	echo "<center>";
		$sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$username = $row['username'];
				$id = $row['id'];
				$email = $row['email'];
				$date = $row['date'];
				$topics = $row['topics'];
				$replies = $row['replies'];
				$score = $row['score'];
				$prof_pic = $row['profile_pic'];
			}
		}
	echo "<center>";
	?>
	<?php echo "<img src='$prof_pic' width='70' height='70'>"; ?><br>
	<b>Username:</b> <?php echo $username; ?><br>
	<b>Id:</b> <?php echo $id; ?><br>
	<b>E-mail:</b> <?php echo $email; ?><br>
	<b>Date Registed:</b> <?php echo $date; ?><br>
	<b>Topics:</b> <?php echo $topics; ?><br>
	<b>Replies:</b> <?php echo $replies; ?><br>
	<b>Score:</b> <?php echo $score; ?><br><br>
	<a href='account.php?action=changepass'>Change Password</a>

<?php

	    if (@$_GET['action'] == "changepass") {
    	echo "<form action='account.php?action=changepass' method='POST'><center><br>";
    	echo "
			Current Password:<input type='text' name='currpass'><br><br>
			New Password:<input type='text' name='newpass'><br><br>
			Retype Password:<input type='text' name='retypepass'><br><br>
			<input type='submit' name='changepass' value='Change'><br>
    	";
    	echo "</form></center>";
    }
?>

<?php
	if (isset($_GET['action']) && $_GET['action'] == "logout") {
		session_destroy();
		header("Location: login.php");
	}

		}else{
			 echo "You must be log in";
		}
	?>
</body>
</html>
