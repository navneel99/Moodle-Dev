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

$sql='SELECT name,course from profs';
$retval=mysqli_query($con,$sql);
                                                                  #Added all as session variables.
#$sqlnew='SELECT name,course_picked from studs';
#$retnew=mysqli_query($con,$sqlnew);

?>
<html>
<head>
<title> See all available courses</title>
</head>
<body>
<p>Available Courses are:</p>
<?php


$id=$_SESSION['stud_id'];
$name=$_SESSION['name'];
$pass=$_SESSION['password'];
$coursepick=$_SESSION['course_picked'];
$timepick=$_SESSION['time_picked'];

while($row=mysqli_fetch_assoc($retval)){
$course=$row['course'];
#echo "navneel";
if($course){
echo " -->\t\t\t$course<br>";
}
}
$retval=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($retval)){
$course=$row['course'];
#while($rownew=mysqli_fetch_assoc($retnew)){

#$namenew=$rownew['name'];
#$currcourse=$rownew['course_picked'];

#if ($name==$namenew){

if ($_POST['courses']=="$course" && $_POST['courses']==True){
$newadd=$_POST['courses'];
$addtime=time();

$sql="Insert into studs values($id,'$pass','$name','$newadd','$addtime',NULL,NULL,$addtime)"; 
#$sql="UPDATE studs "."SET course_picked='$newadd',time_picked='$addtime' "."WHERE name='$name'";
echo"$newadd successfully added.<br>";
$ret2=mysqli_query($con,$sql);

}  #if clause inside the biggest while loop

else{
continue;
} #else clause inside biggest while loop

#} #if name of session is equal to name of the user form stud database

#} #newer while clause
} #biggest while clause ends here




?>
<br><br><br>
<form action="<?php $_PHP_SELF ?>" method="POST">
Choose from above course(s)<br><br>
<input type="text" name="courses"><br><br><br>
<input type="submit" value="Add Course">

</form>
<a href="/Moodle/studwelcome.php"><p align='right'>Go Back</p></a>


</body>

</html>
