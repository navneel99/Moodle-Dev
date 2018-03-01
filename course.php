
<html>
<head><title> Add/Change Courses</title></head>
<body>
<?php
session_start();
$host='localhost';
include 'rootpass.php';

$db='Moodle';
$con=mysqli_connect($host,$user,$pass,$db);
if (!$con){
echo "Couldn't connect Database.";
}
?>

<h1>Add/Change Courses</h1>

<?php


$name=$_SESSION['name'];
if( $_POST['addcourse']){

$newcourse=$_POST['addcourse'];
$newtime=time();
#echo "$newtime";
#echo "$newcourse". $_SESSION['name'];

$sql= "UPDATE profs"." SET course='$newcourse', course_addtime='$newtime'"." WHERE name='$name'";                               #WORKING!!!!!!!!!!
$ret=mysqli_query($con,$sql);
echo "$newcourse will be now taught by you.<br>";
}
?>

<form action="<?php $_PHP_SELF ?>"method="POST">
 "Add/Change Course"
<input type="text" name="addcourse"><br><br>
<input type="submit" value="Add Course">
<br><br>
<a  href="/Moodle/profwelcome.php"><p align='right'>Go Back</p></a>



</body>

</html>
