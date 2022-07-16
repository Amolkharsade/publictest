<?php
require('db.php');
// If the values are posted, insert them into the database.
if (isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $slquery = "SELECT 1 FROM register WHERE email = '$email'";
    $selectresult = mysqli_query($slquery,$conn);
    
    if(mysql_num_rows($selectresult)>0)
    {
        die('email already exists');
    }

    $query = "INSERT INTO `register` (username, password,confirmpassword, email) VALUES ('$username', '$password', '$cpassword', '$email')";
    $result = mysql_query($query);
    if($result){
        $msg = "User Created Successfully.";
    }
   }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login screen</title>
    <style type="text/css">
    .register-form{
        width: 500px;
        margin: 0 auto;
        text-align: center;
        padding: 10px;
        padding: 10px;
        background : #c4c4c4;
        border-radius: 10px;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
    }
    .register-form form input{padding: 5px;}
    .register-form .btn{
        background: #726E6E;
        padding: 7px;
        border-radius: 5px;
        text-decoration: none;
        width: 50px;
        display: inline-block;
        color: #FFF;
    }
    .register-form .register{
        border: 0;
        width: 60px;
        padding: 8px;
    }
    </style>
</head>
<body>
    <div class="register-form">
    <?php
        if(isset($msg) & !empty($msg)){
        echo $msg;
    }
    ?>
    <?php
    if(isset($errormes))
    {
        echo $errormes;
    }
    ?>
        <h1>Register</h1>
        <form action="" method="POST">
            <p><label>User Name: </label>
            <input type="text" id="username" name="username" placeholder="Username">
            </p>
            <p><label>E-Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
            <input id="email" name="email" type="email">
            </p>
            <p><label>Password&nbsp;&nbsp; :</label>
            <input id="password" name="password" type="password">
            </p>
            <p><label>confirm Password &nbsp;&nbsp; :</label>
            <input id="confirmpassword" name="confirmpassword" type="password">
            </p>
            <input type="submit" name="submit" value="register" class="btn register">
            <a class="btn" href="login.php">Login</a>
        </form>
    </div>
</body>
</html>