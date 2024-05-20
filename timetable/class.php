<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="head">
<h1>E-TIME TABLE</h1>
 </div>   
 <div class="nav">
 <a class="a" href="course.php">course</a>
<a class="a" href="user.php">user</a>
<a  class="a"href="period.php">period</a>
<a class="a" href="class.php">class</a>
 </div><br><br><br><br>
 <div class="body">
<form action="" method="post">
    class-name:
    <input type="text" name="classname" required><br><br>
    details:
    <input type="text" name="details"><br><br>
    <input type="submit" name="send" value="send"><br><br>
</form>
<?php
include"connect.php";
if(isset($_POST['send'])){
    $classname=$_POST['classname'];
    $details=$_POST['details'];
    $sql=" INSERT INTO class VALUES('','$classname','$details')";
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
 <table border=1>
<tr>
<th>id</th>
<th>class_name</th>
<th>details</th>
<th colspan="2">action</th>
<?php
$sql=$conn->query("SELECT* FROM USER");
while()
?>
</tr>
 </table>
</body>
</html>