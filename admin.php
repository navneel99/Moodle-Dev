<?php

session_start();
$host='localhost';
include 'rootpass.php';

$db='Moodle';
$con=mysqli_connect($host,$user,$pass,$db);
if (!$con){
echo "Couldn't connect Database.";
}
#echo "Database ".$db." Connected successfully\n";



$username=$_POST['ID'];
$password=$_POST['password'];

if ($username=="admin" && $password=="admin" ){                                              #Session variable created
$newpath="/Moodle/adminwelcome.php";
header("Location:$newpath");
#echo "Login Successful";
exit();
}

if (($username=="") && ($password==""))                          #This code takes care of  Correct display. just see the arrangements.
{
echo "Login To Continue";
}
else{
echo "Unsuccessful Login. Please try again.";
}
mysqli_close($con);
?>


<html>
<head>
<title>Admin's Login</title>
</head>
<body>
<h1 align ="center"> Log-in For Administrator</h1>

<form align="center" action="<?php $_PHP_SELF ?>" method="POST">
Enter your ID and Password <br><br>
<input type='text' name="ID" value="Enter ID"><br>
<input type='password' name="password" value="Enter password"><br>
<input type='submit'>

<p align='right'><i> Instead of 'logging out', you could just close the window.</i></p>
</body>
</html>

