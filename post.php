<!DOCTYPE html>
<html>
<head>
	<title>Post Topics</title>
	<script src="https://kit.fontawesome.com/35edfdc93c.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php
		session_start();
	?>
	<?php
		require "header.php";
	?>
	<?php
	   require ("mysqlconnect.php");
	   if (isset($_SESSION["username"])) {	
    ?>

    <?php
		}else{
			// echo "You must be log in";
			// echo "<br>";
		}
    ?>

    <form action="post.php" method="POST"><br><br>
    	<center>
    	<b>Topic Name:</b><br>
    	<input type="text" name="topic_name" style="width: 400px; height: 40px;"><br><br>
    	<input type="submit" name="submit" value="Post" style="width: 400px;"><br><br>
    	</center>
    </form>

    <?php 
      echo "<center>";

    	$topic_name = @$_POST['topic_name'];
    	//$content = @$_POST['content'];
    	$date = date("y-m-d");


    	if (isset($_POST['submit'])) {
           if ($topic_name) {
           	  if (strlen($topic_name) >= 10 && strlen($topic_name) <= 70) {
           	  	$sql = "INSERT INTO topics (`topics_id`, `topics_name`, `topics_creator`, `date`) VALUES ('', '".$topic_name."',  '".$_SESSION['username']."', '".$date."')";
           	  	if (mysqli_query($conn, $sql)) {
           	  		echo "data insert";
           	  		header("Location: index.php");
           	  	}else{
           	  		echo "data not insert";
           	  	}
           	  }else{
           	  	echo "Topics name must be between 10 and 70 charecters long";
           	  }
           }else{
           	echo "**Please fill all the fields**";
           }
    	}

      echo "</center>";
    ?>

  

</body>
</html>