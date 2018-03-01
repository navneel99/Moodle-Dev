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
<head><title>Add Professors</title>
</head>

<body>
<h1> Add Professor</h1>
<p> Fill the corresponding blanks</p>
<br>
<?php
if ($_POST['id']){
$id=$_POST['id'];
$pass=$_POST['pass'];
$name=$_POST['name'];

$sql="insert into profs values($id,'$pass','$name',NULL,NULL)";
$ret=mysqli_query($con,$sql);
echo "New Professor added.You can close this window now.";
exit();
}
?>

<form action="<?php $_PHP_SELF ?>" method="POST" >

<p>Your ID:</p> <input type="text" name="id">

<p>Password: </p><input type="password" name="pass">

<p>Name:</p> <input type="text" name="name"><br><br>
<input type="submit" value="Submit Form">
</form>
<p align='right'><i> Instead of 'logging out', you could just close the window.</i></p>
</body>
</html>
