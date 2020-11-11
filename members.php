<?php 
	session_start(); 
?>
<?php require "header.php"; ?>

<?php
	require ("mysqlconnect.php");
	if (isset($_SESSION["username"])) {	
?>



	
<?php
    echo "<center> <h1>Memebers</h1>";
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        	$id = $row['id'];
            echo "<a href='profile.php?id=$id'>".$row['username']."</a>";
            echo "<br>";

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
		}
?>

