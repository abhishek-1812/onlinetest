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
$sid=$_SESSION['sid'];
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
if (isset($_POST['submit'])) {
    $quesno=$_POST['quesno'];
    $question=$_POST['question'];
    $op1=$_POST['op1'];
    $op2=$_POST['op2'];
    $op3=$_POST['op3'];
    $op4=$_POST['op4'];
    $answer=$_POST['answer'];
    $cat=$_POST['cat'];
    if (!empty($_POST['ans'])) {
        $userans = $_POST['ans'];
    } else {
        $userans=0; 
    }
}
$answ=$_POST['answ'];
$sql ="SELECT * FROM question";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
$perpage = 1;
$nopages = ceil($count/$perpage);
$start = ($page-1)*$perpage;
$sql = "SELECT * FROM question WHERE `cat`='$exam' limit $start,$perpage";
$result=$conn->query($sql);
while ($row = mysqli_fetch_assoc($result)) {
?>
<form action="setexam.php?page=<?php echo $page+1; ?>&id=<?php echo $exam;?>" method="POST">
<table>
<h4>Q:<?php echo $row['question']?></h4>
    <p><input type=radio name="ans" value="1"/><?php echo $row['op1']?></p>
    <p><input type=radio name="ans" value="2"/><?php echo $row['op2']?></p>
    <p><input type=radio name="ans" value="3"/><?php echo $row['op3']?></p>
    <p><input type=radio name="ans" value="4"/><?php echo $row['op4']?></p>
    <input type="hidden" name="ques" value="<?php echo $ques?>" />
    <input type="hidden" name="cat" value="<?php echo $cat?>" />
    <input type="hidden" name="quesno" value="<?php echo $quesno?>" />
    <input type="hidden" name="op1" value="<?php echo $op1?>" />
    <input type="hidden" name="op2" value="<?php echo $op2?>" />
    <input type="hidden" name="op3" value="<?php echo $op3?>" />
    <input type="hidden" name="op4" value="<?php echo $op4?>" />
    <input type="hidden" name="answ" value="<?php echo $answ?>" />
    <?php if ($page==1) :?>
    <input type = "submit" id='bt' name="submit" value="Next Question" >
    <?php endif; ?>
    <?php if ($page>1 && $page!=$nopages) : ?>
    <?php echo "<a href='setexam.php?page=".($page-1)."&id=".$exam."'>
    Previous</a>";?>
    <input type = "submit" id='bt' name="submit" value="Next Question">
    <?php endif; ?>
    <?php if($page>1 && $page==$nopages) : ?>
    <?php echo "<a href='setexam.php?page=".($page-1)."&id=".$exam."'>
    Previous</a>";?>
    <input type = "submit" id='bt' name="submit" value="Submit Test">
<?php 
    endif; 
?>
</form>
</table>
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
