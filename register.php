<?php
/**
 * Short description for code
 * php version 7.2.10
 * 
 * @category Category_Name
 * @package  PackageName
 * @author   Abhishek Singh <author@example.com>
 * @license  http://www.php.net/license/3_01.txt 
 * @link     http://pear.php.net/package/PackageName 
 * 
 * This is a "Docblock Comment," also known as a "docblock." 
 */
    
require 'config.php';
$errors = array();
// $item = array();
$message = '';

if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';


    if ($password != $repassword) {
        $errors = array('input'=>'password','msg'=>'Password does not match');
    }

    $u = 'SELECT * FROM users WHERE `name`="'.$username.'"';
    $un = mysqli_query($conn, $u);
    $unamecount = mysqli_num_rows($un);


    if ($unamecount>0) {
        $errors = array('input'=>'form','msg'=>'Username already Exists');
    }

    $e = 'SELECT * FROM users WHERE email="'.$email.'"';
    $er = mysqli_query($conn, $e);
    $emailcount = mysqli_num_rows($er);

    if ($emailcount>0) {
        $errors = array('input'=>'form','msg'=>'Email already Exists');
    }

    if (sizeof($errors)==0) {
        $sql = "INSERT INTO users (`name`, `password`, `email`, `role`)
        VALUES ('".$username."', '".$password."', '".$email."','student')";
    
        if ($conn->query($sql) === true) {
            $errors = array('input'=>'form','msg'=>'New Record added succesfully');
        } else {
            $errors = array('input'=>'form','msg'=>$conn->error);
        }
    
        $conn->close(); 
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
        Register
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <div id="wrapper">
        <?php echo $message;?>
        <div id="error">
            <?php if (sizeof($errors)>0) :?>
                <ul>
                <?php foreach ($errors as $error):?>
                    <li><?php echo $errors['msg'];break?></li>
                <?php endforeach;?>
                </ul>
            <?php endif;?>
        </div>
        <div id="signup-form">
        <h2>Sign Up</h2>
        <form action="register.php" method="POST">
        <div class="txt1">  
        <p>
        <label for="username">Username: <br>
        <input type="text" name="username" required>
        </label>
        </p>
        </div>
        <div class="txt1">
        <p>
        <label for="password">Password:<br> 
        <input type="password" name="password" required></label>
        </p>
        </div>
        <div class="txt1">
        <p>
        <label for="repassword">Re-Password: <br>
        <input type="password" 
        name="repassword" required></label>
        </p>
        </div>
        <div class="txt1">
        <p>
        <label for="email">Email:<br> 
        <input type="email" name="email" required></label>
        </p>
        </div>
        <p>
        <input class="btn1" type="submit" name="submit" value="Submit">
        </p>
        <p>
            <a href= "login.php">Log In</a>
        </p>
        </form>
        </div>
    </div>
</body>
</html>