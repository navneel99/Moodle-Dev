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
?>

<html>
<head><title>Admin's Welcome</title></head>
<body>
<h1>Welcome admin!</h1>
<p><center>Select which user must be added</center></p>

<?php
if ($_POST['user']){
$loc=$_POST['user'];
header("Location:$loc");

}
?>

<form target="_blank" action="<?php $_PHP_SELF ?>" method="POST" >
Add the following user:<br><br>
<input type="radio" name="user" value="\Moodle\addprof.php"> Professor<br><br>
<input type="radio" name="user" value="\Moodle\addstud.php"> Student<br><br>
<input type="submit" value="Click here.">
</form>
<p align='right'><i> Instead of 'logging out', you could just close the window.</i></p>
</body>
</html>
