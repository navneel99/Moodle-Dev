 <?php
session_start();
#echo $_SESSION['stud_id'];    #works

$host='localhost';
include 'rootpass.php';
$db='Moodle';
$con=mysqli_connect($host,$user,$pass,$db);
if (!$con){
echo "Couldn't connect Database.";
}
#echo "Database ".$db." Connected successfully\n";
#$sql='SELECT stud_id,name,stud_psswd,course_picked,time_picked,course_removed,time_removed from studs';
#$retval=mysqli_query($con,$sql);


?>


<html>
<head><title>Drop Courses</title> </head>
<body>
<h1>Drop Courses</h1>

<p>These are the list of your currently enrolled courses</p>
<?php
$name=$_SESSION['name'];
$sql="SELECT course_picked from studs where name='$name'";
$retval=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($retval)){
$currcourse=$row['course_picked'];
if ($currcourse){
echo "--> $currcourse<br>";
}
$id=$_SESSION['stud_id'];
$name=$_SESSION['name'];
$pass=$_SESSION['password'];
$coursepick=$_SESSION['course_picked'];
$timepick=$_SESSION['time_picked'];

if ($_POST['delcourse']){
$newdel=$_POST['delcourse'];
$deltime=time();
$sql="delete from studs where  '$newdel'=course_picked and  name='$name'";
#$sql="Insert into studs values($id,'$pass','$name','$newadd','$addtime',NULL,NULL)"; 
#$sql="UPDATE studs "."SET course_picked='$newadd',time_picked='$addtime' "."WHERE name='$name'";
$ret2=mysqli_query($con,$sql);

}

}
?>
<br>
<form action="<?php $_PHP_SELF ?>" method="POST">
<input type="text" name="delcourse">
<input type="submit" value="Confirm">
</form>
<a href="\Moodle\studwelcome.php"><p align='right'>Go Back</p></a>

</body>
</html>
