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
$sql='SELECT prof_id, prof_psswd from profs';
$retval=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($retval)){                                       #See that login unsuccessful is coing in  the beginning
if ($username==$row['prof_id'] && $password==$row['prof_psswd'] ){
$_SESSION['prof_id']=$username;                                               #Session variable created
$newpath="/Moodle/profwelcome.php";
header("Location:$newpath");

#echo "Login Successful";
exit();
}
else{
continue;
}
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
<title>Professor's Login</title>
</head>
<body>
<h1 align ="center"> Log-in For Professors</h1>

<form align="center" action="<?php $_PHP_SELF ?>" method="POST">
Enter your ID and Password <br><br>
<input type='text' name="ID" value="Enter ID"><br>
<input type='password' name="password" value="Enter password"><br>
<input type='submit' value="Log-In">
</body>
</html>
