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
<a class="a"href="course.php">course</a>
<a class="a"href="user.php">user</a>
<a class="a"href="period.php">period</a>
<a class="a" href="class.php">class</a>
 </div><br><br><br><br>
 <div class="body">
<form action="" method="post">
    <input type="hidden" name="id" value="">
    course-name:
    <input type="text" name="coursename" required><br><br>
    details:
    <input type="text" name="details"><br><br>
    <input type="submit" name="send" value="send"><br><br>
</form>
<?php
include  "connect.php";
if(isset($_POST['send'])){
    $coursename=$_POST['coursename'];
    $details=$_POST['details'];
    $sql=" INSERT INTO course VALUES('','$coursename','$details')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo"inserted";
    }
    else{
        echo"try again";
    }

 }
 if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $sql=$conn->query("DELETE FROM `course` WHERE courseid='$id'");
    header('location:course.php');

    }
    $update=false;$id=0;
    $coursename='';
    $details='';

 ?>
 </div>
 <table border="1">
<tr>
    <th>id</th>
    <th>course_name</th>
    <th>details</th>
    <th colspan='2'>action</th>
<?php
$sql=$conn->query("SELECT * FROM course");

while ($row=$sql->fetch_array()) { ?>
    <tr>
    <td> <?php echo $row[0]?></td>
    <td> <?php echo $row[1]?></td>
    <td> <?php echo $row[2]?></td>
    <td><a href="?delete=<?php echo $row[0]?>">delete</a></td>
    <td><a href="?update=<?php echo $row[0]?>">update</a></td>
    </tr>
<?php }
?>

 </table>
 
</body>
</html>