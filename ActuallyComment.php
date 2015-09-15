<html>
<head>
<title>Musify-Comment</title>
</head>
<body>


<h1>
<?php
session_start();
$name=$_SESSION['name'];
echo 'Welcome! '.$name.'<br>';
?>
Comment on Concerts
</h1>


<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

<tr>
<td width="200">Concert:</td>
<td><input name="concert" type="text" id="concert"></td>
</tr>

<tr>
<td width="200">Rate:</td>
<td><input name="rate" type="text" id="rate"></td>
</tr>

<tr>
<td width="200">Comment:</td>
<td><input name="comment" type="text" id="comment"></td>
</tr>


<tr>
<td width="100"> </td>
<td>
<input name="submit" type="submit" id="add" value="submit">

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

if(isset($_POST['concert']))
{
$concert=$_POST['concert'];
$rate=$_POST['rate'];
$comment=$_POST['comment'];

$sql =  "INSERT INTO comment_".$name."(concert,rate,comment)   VALUES('$concert','$rate','$comment')";

mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}

echo "Comment added\n";

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




