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
session_start();
require 'config.php';

echo '<h1>Welcome Admin !!</h1>
<center>'.$_SESSION['userdata']['username'].'<center>';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
        Admin-Dashboard
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <div class="nav">
    <ul>
        <li><a href='addtest.php'>Add Questions</a></li>
        <li><a href='addcat.php'>Add Test</a></li>
        <li><a href= 'logout.php'>Log out</a></li>
    </ul>
    </div>
    <div id="admin">
        <p>Please select from Menu</p>
    </div>
</body>
</html>