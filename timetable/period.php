<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>timetable</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="head">
<h1>E-TIME TABLE</h1>
 </div>   
 <div class="nav">
 <a class="a" href="course.php">course</a>
<a class="a" href="user.php">user</a>
<a class="a" href="period.php">period</a>
<a class="a" href="class.php">class</a>
 </div><br><br><br><br>
 <div class="body">
<form action="" method="post">
    period-date:
    <input type="date" name="perioddate"><br><br>
    date-start:
    <input type="time" name="periodstart"><br><br>
    date-end:
    <input type="time" name="dateend"><br><br>
    <input type="submit" name="send" value="send"><br><br>
</form>
<?php
include"connect.php";
if(isset($_POST['send'])){
    $perioddate=$_POST['perioddate'];
    $periodstart=$_POST['periodstart'];
    $dateend=$_POST['dateend'];
    
    $sql=" INSERT INTO period VALUES('','$perioddate','$periodstart','$dateend')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo"inserted";
    }
    else{
        echo"try again";
    }
 }
 ?>
 </div>
</body>
</html>