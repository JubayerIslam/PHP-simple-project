<?php
	if (!isset($_GET['user']) 
		|| (isset($_GET['user']) && intval($_GET['user']) === 0)
	) {
		
		//header('Location: index.php');

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>answer sheet topics</title>
</head>
<body>
	<?php
		session_start();
	?>
	<?php require "header.php"; ?>
	<?php
		require ("mysqlconnect.php");
		if (isset($_SESSION["username"])) {	
    ?>
    
<?php
  echo "<center>";
  	    if (isset($_GET['user'])) {
		$sql = "SELECT * FROM users WHERE id='".$_GET['user']."'";
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
	}
   echo "<center>";
?>

<?php
	if (isset($_GET['action']) && $_GET['action'] == "logout") {
		session_destroy();
		header("Location: login.php");
	}
		}else{
			echo "You must be log in";
			echo "<br>";
		}
?>
</body>
</html>