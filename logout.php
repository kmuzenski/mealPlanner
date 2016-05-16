<?php
session_start();
if(session_destroy())
{
echo "you have been logged out";
}
?>

<!DOCTYPE html>
<html>

<body>

<br><br><br><br><br><br>

<p>You have been logged out<br><br>
<a href="index.php">home</a><br><br>
<a href="loginpage.php">login</a><br><br>
</p>


</body>
</html>
