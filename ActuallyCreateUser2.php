<html>
<head>
<title>Musify-Perference</title>
</head>
<body>


<h1>
<?php
session_start();
$name=$_SESSION['name'];
echo 'Welcome! '.$name.'<br>';
?>
Personal Perference
</h1>


<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

<tr>
<td width="200">Interested band:</td>
<td><input name="band" type="text" id="band"></td>
</tr>

<tr>
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="Add">

</td>
</tr>
</table>
</form>



<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

<tr>
<td width="200">Interested Music Style:</td>
<td><input name="style" type="text" id="style"></td>
</tr>

<tr>
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="Add">

</td>
</tr>
</table>
</form>

<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

<tr>
<td width="200">Recommand Concert:</td>
<td><input name="recommand" type="text" id="recommand"></td>
</tr>

<tr>
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="Add">

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

if(isset($_POST['band']))
{
$band=$_POST['band'];
$sql =  "INSERT INTO band_".$name."(band)   VALUES('$band')";

mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}

echo "Band added\n";

}


if(isset($_POST['style']))
{
$style=$_POST['style'];
$sql =  "INSERT INTO style_".$name."(style)   VALUES('$style')";

mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}

echo "style added\n";


}




if(isset($_POST['recommand']))
{
$recommand=$_POST['recommand'];
$sql =  "INSERT INTO recommand_".$name."(recommand)   VALUES('$recommand')";

mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}

echo "recommand added\n";
}

?>




<form action="/musify/MusifyUser.php">
    <input type="submit" value="Finish">

</form>
</body>
</html>

<?php
echo 'Available Concert<br>';

$sql = 'SELECT * FROM concert';

mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "Concert: :{$row['concert']}  <br> ".
         "Band : {$row['band']} <br> ".
	 "Style: :{$row['style']}  <br> ".
         "Location : {$row['place']} <br> ".
         "--------------------------------<br>";
} 


mysql_close($conn);

?>




