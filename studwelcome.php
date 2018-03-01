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
$sql='SELECT stud_id,name,stud_psswd,course_picked,time_picked,course_removed,time_removed from studs';
$retval=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($retval)){
if ($_SESSION['stud_id']==($row['stud_id'])){
$_SESSION['name']=($row['name']);
$_SESSION['password']=($row['stud_psswd']);
$name=$_SESSION['name'];
$_SESSION['course_picked']=($row['course_picked']);
$_SESSION['time_picked']=($row['time_picked']);
$_SESSION['course_removed']=($row['course_removed']);
$_SESSION['time_removed']=($row['time_removed']);
}
else{
continue;
}
}                                                                  #Added all as session variables.
?>

<html>
<head>
<title>Welcome to Moodle</title>
</head>
<body>

<?php
if ($_POST['studdo']){
$path=$_POST['studdo'];
header("Location:$path");
exit();
}
?>
<h1 align='center' font face="Comic Sans MS"><b> Mini Moodle<b></h1>
<p> Here you can check for available courses, drop some courses and also check various messages from professors </p>
<?php
echo "These are the courses you are currently studying:<br>";
$sql='SELECT stud_id,name,stud_psswd,course_picked,time_picked,course_removed,time_removed from studs';
$retval=mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($retval)){
$currcourse=$row['course_picked'];
if ($currcourse){
echo "--> $currcourse<br>";
}
}
?>
<br>
<br><br>
<form action="<?php $_PHP_SELF ?>" method="POST">
<input type="radio" name="studdo" value="/Moodle/addcourse.php">Add Course<br><br>
<input type="radio" name="studdo" value="/Moodle/dropcourse.php">Drop Course<br><br>
<input type="radio" name="studdo" value="/Moodle/message.php">Check Messages<br><br>
<input type="submit" value="Go!">


</form>
<p align='right'><i> To log out, just close this window</i></p>

</body>

</html>
