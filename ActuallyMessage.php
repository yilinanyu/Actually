<html>
<head>
<title>Musify-Message</title>
</head>
<body>


<h1>
<?php
session_start();
$name=$_SESSION['name'];
$friend=$_SESSION['friend'];
echo 'Welcome! '.$name.'<br>';
?>
Please leave a message
</h1>


<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

<tr>
<td width="200">Message:</td>
<td><input name="message" type="text" id="message"></td>
</tr>


<tr>
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="add">

</td>
</tr>
</table>
</form>




<?php

$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'saxsom';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

if(isset($_POST['message']))
{
$message=$_POST['message'];


$date_array = getdate();


$date =time();



$sql =  "INSERT INTO message_".$friend."(date,name,message)  VALUES('$date','$name','$message')";

mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}


}




?>
<form action="/musify/MusifyUser.php">
    <input type="submit" value="finish">
</form>
</body>
</html>




