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
if (isset($_POST['submit'])) {
    // echo '<script>alert("ok")</script>';
    $category = $_POST['category'];

    $qur="INSERT INTO category(`name`)VALUE('$category')";
    $run = mysqli_query($conn, $qur);

    if ($run) {
        $errors = array('input'=>'form','msg'=>'Record Inserted Succesfully');
    } else {
        $errors = array('input'=>'form','msg'=>$conn->error);
    }
    $conn->close(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Category</title>
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
        <div>
            <form action="" method="post">    
                <fieldset> 
                    <p>
                        <label for="category">Course: <br>
                        <input type="text" name="category" required></label>
                    </p>
                    
                    <p>
                        <input class="button" name ="submit"type="submit" 
                        value="Submit" />
                    </p>
                    
                </fieldset>   
            </form>
        </div>
    </div>
</body>
</html>