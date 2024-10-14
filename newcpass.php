<?php
mysql_connect("localhost","root",null);
mysql_select_db("info");

$name=$_REQUEST['name'];
$pass=$_REQUEST['pass'];
$but=$_REQUEST['but'];
$repass=$_REQUEST['repass'];
echo "abhinav";

if($but=="insert")
{

    mysql_query("insert into emp(name,age,salary,emp_id)values('$name',$age,$salary,$emp_id)");
    echo "Record added successfully";
}
else if ($but=="select") {
   $res= mysql_query("select* from employee where repass='$repass'");
    while($rec=mysql_fetch_array($res))
    {
         echo$rec[0]." ".$rec[1]." ".$rec[2]." ".$rec[3]."<br> ";
        mysql_query("update employee set pass=$pass, where repass='$repass'");
        echo "record updated successfully ";
        
    }
    # code...
}
else if ($but=="update") {
    # code...
}
else if ($but=="delete") {
    mysql_query("delete from emp where name='$name'");
    echo"record deleted from data base";
    # code...
}
?>