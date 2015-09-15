<html>
<head>
<title>Musify-Add Friend</title>
</head>
<body>


<h1>
<?php
session_start();
$name=$_SESSION['name'];
echo 'Welcome! '.$name.'<br>';
?>
Type in name to add friend
</h1>


<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

<tr>
<td width="200">Frined's name:</td>
<td><input name="friend" type="text" id="friend"></td>
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

if(isset($_POST['friend']))
{
$friend=$_POST['friend'];

$sql =  "select name from user";

mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{

	if($row['name']==$friend){
		echo 'exist-frined add to your list';

		$sql =  "INSERT INTO friend_".$name."(friend)   VALUES('$friend')";
		mysql_select_db('musify');
		$retval2 = mysql_query( $sql, $conn );
		if(! $retval2 )
		{
  			die('Could not insert data: ' . mysql_error());
		}
	}

} 

}

?>
<form action="/musify/MusifyUser.php">
    <input type="submit" value="finish">

</form>
</body>
</html>




