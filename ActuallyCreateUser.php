<html>
<head>
<title>Musify-Create User</title>
</head>
<body>

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

$sql =  "INSERT INTO user(name,password)  VALUES('$name','$password')";
$sql_b="CREATE TABLE band_".$name." (band VARCHAR (20),PRIMARY KEY (BAND))";	
$sql_s="CREATE TABLE style_".$name." (style VARCHAR (20),PRIMARY KEY (style))";
$sql_r="CREATE TABLE recommand_".$name." (recommand VARCHAR (20),PRIMARY KEY (recommand))";
$sql_c="CREATE TABLE comment_".$name." (concert VARCHAR (20),rate VARCHAR (20),comment VARCHAR (20),PRIMARY KEY (concert))";
$sql_f="CREATE TABLE friend_".$name." (friend VARCHAR (20),PRIMARY KEY (friend))";	
$sql_m="CREATE TABLE message_".$name." (date VARCHAR (20),name VARCHAR (20),message VARCHAR (20),PRIMARY KEY (date))";

mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}

$retval = mysql_query( $sql_b, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}

$retval = mysql_query( $sql_s, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}

$retval = mysql_query( $sql_r, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}

$retval = mysql_query( $sql_c, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}

$retval = mysql_query( $sql_f, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}

$retval = mysql_query( $sql_m, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}

session_start();
unset($_SESSION['name']);
if( !isset( $_SESSION['name'] ) )
   {
      $_SESSION['name'] =$name;
   }

echo "Updated data successfully\n";
header( "Location:/musify/MusifyCreateUser2.php" );
exit;
mysql_close($conn);
}

?>

<h1>Step1:Create User</h1>

<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

<tr>
<td width="200">Enter Name:</td>
<td><input name="name" type="text" id="name"></td>
</tr>
<tr>
<td width="200">Set Password:</td>
<td><input name="password" type="text" id="password"></td>
</tr>
<tr>
<td width="200"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="login" type="submit" id="update" value="Create">

</td>
</tr>
</table>
</form>



</body>
</html>