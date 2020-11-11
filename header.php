<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title></title>
</head>

<body>
    <?php require "mysqlconnect.php"; ?>

    <div class="custom-padding">
        <nav>
            <div class="logo">Logo</div>

            <ul class="menu-area">
                <li><a href="index.php">Home</a></li>
                <li><a href="account.php">My Account</a></li>
                <li><a href="members.php">Member</a></li>
                <?php if (isset($_SESSION["username"])) { ?>

                <?php 
                    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id =  $row['id'];
                        }
                    }
                ?>
                
                <li><a href="index.php?action=logout">Log Out</a></li>
                <li><?php echo "<a href='profile.php?id=$id'>"; 
                          echo $_SESSION['username'];
                ?></a></li>
                
                <?php } else { ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">login</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</body>
</html>