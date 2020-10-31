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
$exam = $_GET['id'];

?>
    <?php
    $res ="SELECT * FROM question WHERE `cat`='$exam'";
    $result=$conn->query($res);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <h4>Q:<?php echo $row['question']?></h4>
    <input type="radio" name="check" value="1"><?php echo $row['op1']?><br>
    <input type="radio" name="check" value="2"><?php echo $row['op2']?><br>
    <input type="radio" name="check" value="3"><?php echo $row['op3']?><br>
    <input type="radio" name="check" value="4"><?php echo $row['op4']?><br>
    <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Start Exam</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
</body>
</html>