
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

$currcourse=$_SESSION['course'];
$name=$_SESSION['name'];
if( $_POST['addcourse']){

$newcourse=$_POST['addcourse'];
$newtime=time();
$sql2="delete from studs where course_picked='$currcourse'";
$ret2=mysqli_query($con,$sql2);
if ($currcourse){
echo "You are no longer teaching $currcourse. Students who were in the course have been removed.<br><br>";
}
$sql= "UPDATE profs"." SET course='$newcourse', course_addtime='$newtime'"." WHERE name='$name'";                               #WORKING!!!!!!!!!!
$ret=mysqli_query($con,$sql);
#$sql2="UPDATE studs"."SET course_removed=True where";
echo "You will now be teaching $newcourse.<br><br>";
$_SESSION['course']=$newcourse;
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
