<?php
session_start();
mysql_connect("localhost","root",null);
mysql_select_db("info");

$but=$_REQUEST['but'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$repass=$_REQUEST['repass'];

if($but=="login")
{
    $res=mysql_query("select * from employee where name='$name' and pass='$pass'");
    $c=0;
    while($rec=mysql_fetch_array($res))
    {
        $c=$c+1;
    }
    if($c==0)
    header("location:signup.html");
    else{
        $_SESSION['sid']=$name;
    header("location:home.php");
}
}
else if($but=="signup"){
    
    $res=mysql_query("select * from employee where name='$name' and email='$email' and pass='$pass' and repass='$repass' ");
    $c=0;
    while($rec=mysql_fetch_array($res))
    {
        $c=$c+1;
    }
    if($c==0)
    {
        mysql_query("insert into employee(name,email,pass,repass) values('$name','$email','$pass','$repass')");
        echo "user created successfully";
    }
    else{
        echo "Already exist";
    }
    echo "<a href=login.html>Go to home</a>";
}
?>