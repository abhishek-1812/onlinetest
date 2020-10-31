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
 * This is a "Docblock Comment," also known as a "docblock."  The class'
 * docblock, below, contains a complete description of how to write these.
 */
session_start();
require 'config.php';
$errors = array();

if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $type = isset($_POST['role'])?$_POST['role']:'';
  
    if (sizeof($errors)==0) {
        $sql= 'SELECT * FROM users WHERE 
        `name`="'.$username.'" AND `password`="'.$password.'"
         AND `role`="'.$type.'"' ; 
        
        $res = $conn->query($sql);
        if ($res->num_rows >0) {
            while ($row = $res->fetch_array()) {
                $_SESSION['userdata']=array('username' => $row['username'],
                'userid' => $row['userid'],'role'=> $row['role']);
                if ($row['role']=="admin") {
                    header('Location: admindash.php');
                } else {
                    header('Location: user.php');
                }    
            }
        } else {
            $errors = array('input'=>'form','msg'=>'Invalid User Detail');    
        }
        $conn->close();
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>
        EXAM PORTAL
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="wrapper">
    <div id="error">
                <?php if (sizeof($errors)>0) :?>
                    <ul>
                        <?php foreach ($errors as $error):?>
                        <li><?php echo $errors['msg'];break?></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>
            </div>
        <div id="login-form">
        <h2>Login</h2>
        <form action="login.php" method="POST">
        <div class="txt">
            <p>
                <label for="username">Username: <input type="text" 
                name="username" required></label>
            </p>
        </div>
        <div class="txt">
            <p>
                <label for="password">Password: <input type="password" 
                name="password" required></label>
            </p>
        </div>
        <p>
        <div class="txt">
            <p>
                <label for="role">I'm a:</label>
                <input type="radio" name="role" value="admin" required>Admin |
                <input type="radio" name="role" value="student" required >Student 
            </p>
        </div>
            <input class="btn" type="submit" name="submit" value="Submit">
        </p>
         <p>
            <a href= "register.php">Sign Up</a>
        </p>
         </form>
        </div>
    </div>
</body>
</html>