<form>
<?php
session_start();
$id=$_SESSION['sid'];
mysql_connect("localhost","root",null);
mysql_select_db("info");

$res=mysql_query("select * from sent where frm='$id'");
while($rec=mysql_fetch_array($res))
{
    $u=$rec[0];
    echo " <input type=checkbox name=dsn[] value=$u;><a href=home.php?snval=$u>".$rec[3]."</a><br>";
}
?> 
<input type=submit name=snbut value=deletesent>
</form>