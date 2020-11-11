<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="index.css">
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

<div class="btn">
<a href="post.php"><button >Post Topics</button></a>
</div>

<div class="row">
	<div class="col">
		<strong>ID:</strong>
	</div>
	<div class="col">
		<strong>Topics Name:</strong>
	</div>
	<div class="col">
		<strong>Topics Creator:</strong>
	</div>
	<div class="col">
		<strong>Date:</strong>
	</div>
</div>



<?php 
	$sql = "SELECT topics.*, users.id as user_id FROM `topics` join users on users.username = topics.topics_creator";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)) {
		while ($row = mysqli_fetch_assoc($result)) {
		
			$id = $row['topics_id'];
			$topic_name = "<a href='replies.php?topic=$id'>".$row['topics_name']."</a>";
			$topics_creator = "<a href='profile.php?id=".$row['user_id']."'>".$row['topics_creator']."</a>";
			$date = $row['date'];
			echo '<div class="row">
					<div class="col">'.$id.'</div>
					<div class="col">'.$topic_name.'</div>
					<div class="col">'.$topics_creator.'</div>
					<div class="col">'.$date.'</div>
				</div>';

		}
	}else{
		echo "Not found";
	}
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
