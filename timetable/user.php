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
<a  class="a"href="class.php">class</a>
 </div><br><br><br><br>
 <div class="body">
<form action="" method="post">
    username:
    <input type="text" name="username" required><br><br>
    tel:
    <input type="text" name="tel"><br><br>
    email:
    <input type="email" name="email"><br><br>
    status:
    <input type="text" name="status"><br><br>
    role:
    <input type="text" name="role"><br><br>
    <input type="submit" name="send" value="send"><br><br>

</form>
<?php
include"connect.php";
if(isset($_POST['send'])){
    $username=$_POST['username'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $status=$_POST['status'];
    $role=$_POST['role'];
   
    $sql=" INSERT INTO user VALUES('','$username','$tel','$email','$status','$role')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo"inserted";
    }
    else{
        echo"try again";
    }
 }
 ?>
 <?php
 if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $sql=$conn->query("DELETE FROM `user` WHERE user_id='$id'");
    header('location:user.php');
 }
 ?>
 </div>
 <table border="1">
<tr>
    <th>id</th>
    <th>user_name</th>
    <th>tel</th>
    <th>email</th>
    <th>status</th>
    <th colspan='2'>action</th>
<?php
$sql=$conn->query("SELECT * FROM user");
while ($row=$sql->fetch_array()) { ?>
    <tr>
    <td> <?php echo $row[0]?></td>
    <td> <?php echo $row[1]?></td>
    <td> <?php echo $row[2]?></td>
    <td> <?php echo $row[3]?></td>
    <td> <?php echo $row[4]?></td>
    <td><a href="?delete=<?php echo $row[0]?>">delete</a></td>
    <td><a href="?update=<?php echo $row[0]?>">update</a></td>
    </tr>
<?php }
?>

</body>
</html>