<form >
<?php
session_start();
$id=$_SESSION['sid'];
mysql_connect("localhost","root",null);
mysql_select_db("info");

$res=mysql_query("select * from draft where too='$id'");
while($rec=mysql_fetch_array($res))
{
    $u=$rec[0];
    echo " <input type=checkbox name=ddr[] value=$u;><a href=home.php?drval=$u>".$rec[3]."</a><br>";
}
?> 
<input type=submit name=drbut value=deletedraft>
</form>