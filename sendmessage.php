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

?>


<html>
<head>
<title>Send Message</title>
</head>
<body>

<?php
$id=$_SESSION['prof_id'];
$course=$_SESSION['course'];

if ($_POST['sendmessage']){
$message=$_POST['sendmessage'];
$messagetime=time();
#echo "$message $id $course $messagetime";
$sql="insert into message values('$course',$id,'$message','$messagetime',$messagetime)";
$ret=mysqli_query($con,$sql);
}
?>


<h1>Send Message to your Students</h1>

<form action="<?php $_PHP_SELF  ?>" method="POST">

<input type="text" name="sendmessage" size=100>
<input type="submit">
</form>
<a href="/Moodle/profwelcome.php">Go Back </a>
</body>

</html>
