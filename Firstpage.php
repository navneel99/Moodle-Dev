<?php

if( $_POST["identity"] )
{
$direct = $_POST["identity"];
header( "Location:$direct" );
exit();
}
?>



<html>
<head>
<title>Mini Moodle</title>
</head>
<body>
<h1 align='center'>Welcome to Mini-Moodle </h1>
<p align="center"><i>Please select your identity.<br><br></i></p>
<form target="_blank" action="<?php $_PHP_SELF ?>" method="POST">
<input type = "radio" name="identity" value="/Moodle/proflogin.php" checked> Professor<br><br>
<input type="radio" name="identity" value="/Moodle/studlogin.php" >Student <br><br>
<input type="radio" name="identity" value="/Moodle/admin.php" >Admin<br><br>

<input type="submit" value="Enter the site">

</form>
<p align='right'><i> Instead of 'logging out', you could just close the window.</i></p>

</body>
</html>


