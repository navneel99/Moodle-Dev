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
?>


<html>
<head>
<title>Check Messages</title>
</head>
<body>
<h1>Check Messages</h1>
<p><i>Please note that the most recent messages are at the <u>bottom</u>. </i></p>

<?php
$name=$_SESSION['name'];

#echo "$name";


$sql="select profs.name,message.message,studs.course_picked from message, studs , profs where studs.course_picked = message.course and  studs.curs_time < message.mess_time and studs.name='$name' and message.prof_id=profs.prof_id"; 
#echo "$sql";
$ret=mysqli_query($con,$sql);

while ($row=mysqli_fetch_assoc($ret)){
#echo "Navneel";
$message=$row['message'];

$course=$row['course_picked'];
$pname=$row['name'];
echo"Course Name:";
echo "$course\r\n";
echo "<br>";

echo "Professor:";
echo "$pname<br>";
 
echo "Message:"; 
echo " $message<br><br><br>";

}

?>

<a href="/Moodle/studwelcome.php"><p align='right'>Go Back</p></a>
</body>
</html>
