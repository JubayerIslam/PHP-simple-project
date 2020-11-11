<!DOCTYPE html>
<html>
<head>
	<title>Login system</title>
</head>
<body>
	<?php
		require "header.php";
	?>
	<form action="login.php" method="post"><br>
		Username:<input type="text" name="username"><br><br>
		Password:<input type="password" name="password"><br><br>
		<input type="submit" name="submit" value="login">
	</form>
	<?php 
		require ("mysqlconnect.php");
	?>
<pre>
	<?php 
    session_start();

		if (isset($_POST['submit'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];

			if ($username && $password) {
				$check = "SELECT * FROM users WHERE username='".$username."'";
				$result = mysqli_query($conn,$check);

				if (mysqli_num_rows($result) != 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$db_username = $row['username'];
						$db_password = $row['password'];
					}
					if ($username == $db_username && $password == $db_password) {
						$_SESSION["username"] = $username;
						header("Location: index.php");
					}else{
						echo "Your password is wrong";
					}
				}else{
					die("could not found");
				}
			}
		}else{
			echo "please fill in the fields";
		}
	?>
</body>
</html>