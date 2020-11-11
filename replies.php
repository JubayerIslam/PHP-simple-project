<?php
	if (!isset($_GET['topic']) 
		|| (isset($_GET['topic']) && intval($_GET['topic']) === 0)
	) {
		
		header('Location: index.php');

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>reply answer</title>
</head>
<body>
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
	if (isset($_GET['topic'])) {
		$sql = "SELECT * FROM topics WHERE topics_id='".$_GET['topic']."'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)) {
			while ($row = mysqli_fetch_assoc($result)) {
				//echo $row['topics_id'];
				echo "<p style='text-align:center; color:red;'>".$row['topics_name']."</p>";
			}

		}else{
			echo "failed";
		}
	}
?>

<form action="replies.php" method="post">
	<center>
	<b>Reply Answer:</b><br>
	<input type="hidden" name="topic" value="<?=$_GET['topic']?>">
	<textarea name="reply_ans" style="width: 400px; height: 200px;"></textarea><br>
	<input type="submit" name="submit" value="submit" style="width: 400px;"><br><br>
	</center>
</form>

<?php
require "mysqlconnect.php";
	echo "<center>";

    	if (isset($_POST['submit'])) {



    			$reply_ans = $_POST['reply_ans'];
	            $date = date("y-m-d");
	            $topic = $_POST['topic'];
	            

           if ($reply_ans) {

           	  if (strlen($reply_ans) >= 20 && strlen($reply_ans) <= 999) {
           	  	$sql = "INSERT INTO answer (`topic_answer`,`date`,`topics_id`) VALUES ('".$reply_ans."', '".$date."', '".$topic."')";
           	  	if (mysqli_query($conn, $sql)) {
           	  		echo "data insert";
           	  		//header("Location: index.php");

           	  	}else{
           	  		echo "data not insert";
           	  	}
           	  }else{
           	  	echo "Answer must be between 20 and 1000 charecters long";
           	  }
           }else{
           	echo "**Please answer the fields**";
           }
    	}

	echo "</center>";
?>
<br><br><center><h3>Answer Sheet</h3>
<?php echo '<table border="1px">' ?>
	<tr>
		<td width="10px;" style="text-align: center;">
			<span>ID</span>
		</td>
		<td width="400px;" style="text-align: center;">
			Answer
		</td>
		<td width="80px;" style="text-align: center;">
			Date
		</td>
		<td width="80px;" style="text-align: center;">
			Topic id
		</td>
	</tr>
</center>
<?php 
	$sql = "SELECT * FROM answer WHERE topics_id='".$_GET['topic']."'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>".$row['replies_id']."</td>";
			echo "<td>".$row['topic_answer']."</td>";
			echo "<td>".$row['date']."</td>";
			echo "<td>".$row['topics_id']."</td>";

		}
	}else{
		echo "Not found";
	}
	echo "</table>";
 ?>

<?php
	}else{
		 echo "You must be log in";
		 echo "<br>";
	}
?>
</body>
</html>


