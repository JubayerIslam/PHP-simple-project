<?php 
	session_start(); 
?>
<?php
	require "header.php";
?>
<?php 
	require "mysqlconnect.php";
	if (isset($_SESSION["username"])) {	
?>

<?php
	if (isset($_GET['action']) && $_GET['action'] == "logout") {
		session_destroy();
		header("Location: login.php");
	}
?>

<?php
  echo "<center>";
	if (isset($_GET['id'])) {
		$sql = "SELECT * FROM users WHERE id='".$_GET['id']."'";
		
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) != 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<h1>" . $row['username'] . "</h1><img src='".$row['profile_pic']."' width='50' height='50'>";
				echo "<br>";
				echo "<b>Date Registed: </b>". $row['date']. "<br>";
				echo "<b>E-mail: </b>" . $row['email'] . "<br>";
				echo "<b>Topics: </b>" . $row['topics'] . "<br>";
				echo "<b>Replies: </b>" . $row['replies'] . "<br>";
				echo "<b>Score: </b>" . $row['score'] . "<br>";
				
			}
		}else{
			echo "Id not found";
		}
	}else{
		//header("Location: index.php");
	}
   echo "<center>";
?>

<?php	
	}else{
			 echo "You must be log in";
		}
?>