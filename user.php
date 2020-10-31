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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Exam</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div>
        <?php
            $res = mysqli_query($conn, "SELECT * FROM category");
        while ($row = mysqli_fetch_array($res)) {
            ?>
            <a href="setexam.php?id=<?php echo $row['name']?>"><?php echo $row['name']?></a>   
            <?php
        }
        ?>
    </div>
</body>
</html>
