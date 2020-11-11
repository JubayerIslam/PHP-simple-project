<!DOCTYPE html>
<html>

<head>
    <title>Register system</title>
</head>

<body>

    <?php 
	require "header.php";
?>
        <form action="register.php" method="post">
            <br> Username:
            <input type="text" name="uname">
            <br>
            <br> E-mail:
            <input type="email" name="email">
            <br>
            <br> Password:
            <input type="password" name="pwd">
            <br>
            <br> Confirm Password:
            <input type="password" name="confirmpwd">
            <br>
            <br>
            <input type="submit" name="submit" value="Register"> or <a href="login.php">Login</a>
        </form>

<?php 

    require "mysqlconnect.php";


    	if (isset($_POST['submit'])) {

    	$username = $_POST['uname'];
    	$email = $_POST['email'];
    	$password = $_POST['pwd'];
    	$confirmpwd = $_POST['confirmpwd'];
    	$date = date("Y-m-d");
    	
    		if ($username && $email && $password && $confirmpwd) {
    			if (strlen($username) >= 5 && strlen($username) < 25 && strlen($password) > 6) {
    				if ($password == $confirmpwd) {
    					$sql = "INSERT INTO `users` (`username`, `email`, `password`,`date`)
                        VALUES ('".$username."', '".$email."', '".$password."', '".$date."')";
                    if(mysqli_query($conn, $sql)){
            	        echo "You have Register <a href='login.php'>here</a> here to login";
                    }else{
            	         echo "failed $sql" . "<br>" . mysqli_error($conn);
                    }
    				}else{
    					echo "password do not match";
    				}
    			}else{
    				if (strlen($username) >= 5 || strlen($username) < 25) {
    					echo "Username must be 5 charecter 25 charecter";
    				}
    				if (strlen($password) > 6) {
    					echo "password longer than 6 charecters";
    				}
    			}
    		}else{
    			echo "please fill in all the fields";
    		}

    	}
    	mysqli_close($conn);
?>
</body>

</html>