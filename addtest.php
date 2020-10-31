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
require "config.php";
$errors = array();
$message = "";
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
        <table>       
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>            
            </thead>       
            <tbody>            
                <tr>
                <?php
                require 'config.php';
                $query = "SELECT * FROM category";

                $run = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($run)) {
                ?>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><a href="select.php?id=<?php echo $row['id'] ?>"
                    >Select</a></td>
                </tr> 
                <?php
                }
                ?>
            </tbody>                        
        </table> 
    </div>
</body>
</html>