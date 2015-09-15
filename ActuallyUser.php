<html>
<head>
<title>

Musify
<?php

session_start();
$name=$_SESSION['name'];


echo $name;
?>

</title>
</head>
<body>



<h1>
<?php
echo $name."'s Musify Blog";
?>
</h1>
<p>================================================</p>

<form action="/musify/MusifyLogin.php">
    <input type="submit" value="Log out">
    
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
?>

<h2>-
<?php
echo $name."'s ";
?>
Friend
</h2>

<?php
$sql = "SELECT * FROM friend_".$name;
mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{

	$a=$row['friend'];
	echo '<a href="/musify/MusifyFriend.php?friend='.$a.'">'.$a.'</a>,';
} 

echo '<br>';



?>


<form action="/musify/MusifyAddFriend.php">
    <input type="submit" value="add">

</form>


<h2>-
<?php
echo $name."'s ";
?>
Music Perference
</h2>
<?php
echo 'Perfered Band:';

$sql = "SELECT * FROM band_".$name;
mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo $row['band'].",";
} 

echo '<br>Perfered Style:';

$sql = "SELECT * FROM style_".$name;
mysql_select_db('musify');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo $row['style'].",";
} 

?>

<form action="/musify/MusifyCreateUser2.php">
    <input type="submit" value="edit">

</form>



<h2>-
<?php
echo $name."'s ";
?>
Concert Recommandation
</h2>

<?php
$sql2 = "SELECT * FROM concert where concert in(select * from recommand_".$name.")";
mysql_select_db('musify');
$retval = mysql_query( $sql2, $conn );
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
?>
<form action="/musify/MusifyCreateUser2.php">
    <input type="submit" value="edit">

</form>


<h2>-
<?php
echo $name."'s ";
?>
Comment on Concert
</h2>


<?php
$sql2 = "SELECT * FROM comment_".$name;
mysql_select_db('musify');
$retval = mysql_query( $sql2, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "Concert: :{$row['concert']}  <br> ".
        "Rate : {$row['rate']} <br> ".
	 "Comment: :{$row['comment']}  <br> ".
       
         "--------------------------------<br>";
} 
?>

<form action="/musify/MusifyComment.php">
    <input type="submit" value="edit">

</form>



<h2>-
System Recommandation
</h2>

<?php
$sql2 = "SELECT * FROM concert where band in(select * from band_".$name.") or style in(select * from style_".$name.")";
mysql_select_db('musify');
$retval = mysql_query( $sql2, $conn );
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
?>
<h2>-
Message
</h2>
<?php
$sql2 = "SELECT * FROM message_".$name;
mysql_select_db('musify');
$retval = mysql_query( $sql2, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
   
    echo "{$row['date']} --- ".
        "{$row['name']}--- ".
	 "{$row['message']}".
         
         "<br>";

} 
?>
</body>
</html>