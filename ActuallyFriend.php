<?php
  if( $_GET["friend"])
  {
     

     
  }
?>
<html>
<head>
<title>

Musify
<?php

session_start();
unset($_SESSION['friend']);
$_SESSION['friend']=$_GET['friend'];

$name=$_SESSION['friend'];


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

<form action="/musify/MusifyUser.php">
    <input type="submit" value="Back">
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
Message:
</h2>


<form action="/musify/MusifyMessage.php">
    <input type="submit" value="Leave a message">
</form>

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