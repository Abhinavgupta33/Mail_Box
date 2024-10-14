<form>
<?php
session_start();
$id=$_SESSION['sid'];
mysql_connect("localhost","root",null);
mysql_select_db("info");

$res=mysql_query("select * from trash where too='$id'");
while($rec=mysql_fetch_array($res))
{
    $u=$rec[0];
    echo " <input type=checkbox name=dtr[] value=$u><a href=home.php?trval=$u>".$rec[3]."</a><br>";
}
?> 
<input type=submit name=trbut value=deletetrash>

<input type=submit name=trbut2 value=restoretrash>
</form>