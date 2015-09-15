<html>
<head>
<title>Musify-All your concert is here!</title>
</head>
<body>






<h1>Welcome to Musify! We have your concert!</h1>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">


<tr>
<td width="100">User Name:</td>
<td><input name="name" type="text" id="name"></td>
</tr>
<tr>
<td width="100">Password:</td>
<td><input name="password" type="text" id="password"></td>
</tr>
<tr>
<td width="100"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="login" type="submit" id="update" value="Login">

</td>
</tr>
</table>
</form>


<?php

if(isset($_POST['name']))
{

$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'saxsom';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$name = $_POST['name'];
$password = $_POST['password'];

$sql =  "select * from user where name='".$name."'";
	

mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    if($row['password']==$password){
echo "in";
session_start();
$_SESSION['name']=$name;
mysql_close($conn);
header('Location:/musify/MusifyUser.php');
}else{
echo "Wrong Password";
mysql_close($conn);
}
} 




}

?>







<form action="/musify/MusifyCreateUser.php">
    <input type="submit" value="Create User">
</form>


</body>
</html>