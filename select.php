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
$id =$_REQUEST["id"];
$cat = "";
$query = "SELECT * FROM category WHERE id=$id";
$run = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($run)) {
    $cat = $row['name'];
}
if (isset($_POST['submit'])) {
    $loop=0;
    $count=0;
    $res = "SELECT * FROM question WHERE  cat= '$cat' order by id asc";
    $qrun = mysqli_query($conn, $res);
    $count = mysqli_num_rows($qrun);
    if ($count == 0) {

    } else {
        while ($row = mysqli_fetch_assoc($qrun)) {
            $loop = $loop+1;
            mysqli_query($conn, "UPDATE question SET quesno='$loop' WHERE id=$row[id]");
        }
    }
    $loop = $loop+1;
    $ques = isset($_POST['que'])?$_POST['que']:'';
    $op1 = isset($_POST['op1'])?$_POST['op1']:'';
    $op2 = isset($_POST['op2'])?$_POST['op2']:'';
    $op3 = isset($_POST['op3'])?$_POST['op3']:'';
    $op4 = isset($_POST['op4'])?$_POST['op4']:'';
    $ans = isset($_POST['ans'])?$_POST['ans']:'';

    $qur = "INSERT INTO question(`quesno`,`question`,`op1`,`op2`,`op3`,`op4`,`answer`,`cat`) VALUES 
    ('$loop','$ques','$op1','$op2','$op3','$op4','$ans','$cat')";
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
            <h2>Add Questions</h2>
            <form action="" method="POST">
            <div class="txt1">  
                <p>
                    <label for="que">Question: <br>
                    <input type="text" name="que" required>
                    </label>
                </p>
            </div>
            <div class="txt1">
                <p>
                    <label for="op1">Option-1:<br> 
                    <input type="text" name="op1" required>
                    </label>
                </p>
            </div>
            <div class="txt1">
                <p>
                    <label for="op2">Option-2:<br> 
                    <input type="text" name="op2" required>
                    </label>
                </p>
            </div>
            <div class="txt1">
                <p>
                    <label for="op3">Option-3:<br> 
                    <input type="text" name="op3" required>
                    </label>
                </p>
            </div>
            <div class="txt1">
                <p>
                    <label for="op4">Option-4:<br> 
                    <input type="text" name="op4" required>
                    </label>
                </p>
            </div>
            <div class="txt1">
                <p>
                    <label for="ans">Answer:<br> 
                    <input type="text" name="ans" required>
                    </label>
                </p>
            </div>
        <p>
        <input class="btn1" type="submit" name="submit" value="Submit">
        </p>
        <p>
        <a href= "admindash.php">Back</a>
        </p>
        </form>
        </div>
    </div>
</body>
</html>