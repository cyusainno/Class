<!-- delete -->
<?php
if(isset($_GET['delete'])){
    $id=$_GET['id'];
    $sql=$conn->query("DELETE * FROM user WHERE id='$id'");
    header("location:home.php");
}
?>
<!-- insert -->
<?php
if(isset($_POST['send'])){
$name=$_POST['name'];
$password=$_POST['password'];
$sql=mysqli_query($conn,"INSERT INTO user VALUES('$name','$password'");
if($sql){
    header("location:login.php");
}
}
?>
<!-- login -->
<?php
if(isset($_POST['send'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $sql="SELECT * FROM user WHERE name='$name' AND password='$password'";
    $query=mysqli_query($conn,$sql);
    header("location:home.php");
}
?>
<!-- logout -->
<?php
session_start();
session_destroy();
header("location:login.php");
?>
<!-- coonection -->
<?php
$conn= new mysqli("localhost","root","","db_name");
?>
<!-- retrive -->
<?php
$sql=$conn->query("SELECT  * from  user");
while($row=$sql->fetch_array()){ ?>
      <tr>
    <td> <?php echo $row[0]?></td>
    <td> <?php echo $row[1]?></td>
    <td> <?php echo $row[2]?></td>
    <td><a href="?delete=<?php echo $row[0]?>">delete</a></td>
    <td><a href="?update=<?php echo $row[0]?>">update</a></td>
    </tr> 
<?php } 

?>