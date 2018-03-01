<?php
session_start();
#echo $_SESSION['prof_id'];    #works

$host='localhost';
include 'rootpass.php';
$db='Moodle';
$con=mysqli_connect($host,$user,$pass,$db);
if (!$con){
echo "Couldn't connect Database.";
}
#echo "Database ".$db." Connected successfully\n";
$sql='SELECT prof_id,name,course,course_addtime from profs';
$retval=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($retval)){
if ($_SESSION['prof_id']==($row['prof_id'])){
$_SESSION['name']=($row['name']);
$name=$_SESSION['name'];
$_SESSION['course']=($row['course']);
$_SESSION['course_addtime']=($row['course_addtime']);
}
else
continue;
}                                                                  #Added all as session variables.
?>


<html>
<head>
<title>Welcome to Moodle</title>
</head>
<body>

<h1 align='center' font face="Comic Sans MS"><b> Mini Moodle<b></h1>
<?php echo "<p><center> Welcome Professor ".$_SESSION['name']." !</center></p><br>" ?>
<p> Here you can add courses to teach or send a message to the student who are registered in your course</p>
<?php
if ($_SESSION['course']==NULL){
echo "Your Current Course: NONE";
}
else
{ echo "You are currently teaching <i> ".$_SESSION['course'].". </i>";
}


if ($_POST['whatdo']){
$newpath=$_POST['whatdo'];
header("Location:$newpath");
exit();
}
?>
<br><br>
<form action="<?php $_PHP_SELF ?>" method="POST">
<input type="radio" name="whatdo" value="\Moodle\course.php">Add Course<br>
<input type="radio" name="whatdo" value="\Moodle\sendmessage.php">Send Message<br>
<input type="submit" value="Submit your Option">
</form>

<p align='right'><i> To log out, just close this window</i></p>


</body>
</html>
