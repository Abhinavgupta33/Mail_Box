<?php
session_start();
$id=$_SESSION['sid'];
mysql_connect("localhost","root",null);
mysql_select_db("info");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Interface</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>

    <div class="container">
        <!-- Sidebar Menu -->
        <div class="sidebar">
            <h2>Email</h2>
            <ul>
                <li><a href="home.php ? val=in">Inbox</a></li>
                <li><a href="home.php ? val=sn">Sent</a></li>
                <li><a href="home.php ?val=dr">Draft</a></li>
                <li><a href="home.php ?val=tr">Trash</a></li>
                <li><a href="home.php ?val=co">Compose</a></li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1>Welcome <?php echo "$id";?></h1>
            <h2 alignment=left><a href=login.html>Logout</a>|<a href="home.php?val=cp">ChangePassword</a></h2>
            <div class="email-list">
                
            
            <?php
                    $val=$_REQUEST['val'];
                    if($val=="in")
                    include("inbox.php");
                    elseif($val=="co")
                    include("compose.php");
                    elseif($val=="sn")
                    include("sent.php");
                    elseif($val=="dr")
                    include("draft.php");
                    elseif($val=="tr")
                    include("trash.php");
                    elseif($val=="cp")
                    include("cpass.php");
                ?>
                <?php
                $sbut=$_REQUEST['sbut'];
                if($sbut)
                {
                    $too=$_REQUEST['too'];
                    $frm=$id;
                    $sub=$_REQUEST['sub'];
                    $msg=$_REQUEST['msg'];

                    if($sbut=="Save")
                    {
                        mysql_query("insert into draft(too,frm,sub,msg)values('$frm','$frm','$sub','$msg')");
                        echo "mail saved successfully";
                    }
                    else if($sbut=="Send")
                    {
                        $res=mysql_query("select *from employee where name='$too'");
                        $c=0;
                        while($rec=mysql_fetch_array($res))
                        {
                            $c=$c+1;

                        }
                        if($c==0)
                        {
                            $sub="Failed_".$sub;
                            mysql_query("insert into draft(too,frm,sub,msg)values('$too','$frm','$sub','$msg')");
                            echo "mail sending failed";
                        }
                        else{
                            mysql_query("insert into inbox(too,frm,sub,msg)values('$too','$frm','$sub','$msg')");
                            mysql_query("insert into sent(too,frm,sub,msg)values('$too','$frm','$sub','$msg')");
                            echo "mail sending successfully";
                        }
                    }
                }
                ?>
                <?php
                $inval=$_REQUEST['inval'];
                if($inval)
                {
                    $res=mysql_query("select * from inbox where id=$inval");
                    $msg="";
                    while($rec=mysql_fetch_array($res))
                    {
                        $msg=$rec[4];
                    }
                    echo $msg;
                }
                ?>
                <?php

                $drval=$_REQUEST['drval'];
                if($drval)
                {
                    $res=mysql_query("select * from draft where id=$drval");
                    $msg="";
                    while($rec=mysql_fetch_array($res))
                    {
                        $msg=$rec[4];
                    }
                    echo $msg;
                }
                ?>
                <?php
                
                $snval=$_REQUEST['snval'];
                if($snval)
                {
                    $res=mysql_query("select * from sent where id=$snval");
                    $msg="";
                    while($rec=mysql_fetch_array($res))
                    {
                        $msg=$rec[4];
                    }
                    echo $msg;
                }
                ?>
                <?php
                $trval=$_REQUEST['trval'];
                if($trval)
                {
                    $res=mysql_query("select * from trash where id=$trval");
                    $msg="";
                    while($rec=mysql_fetch_array($res))
                    {
                        $msg=$rec[4];
                    }
                    echo $msg;
                }
            ?> 
            <?php
            $inbut=$_REQUEST['inbut'];
            if($inbut=="deleteinbox")
            {
                $din=$_REQUEST['delin'];
                foreach($din as $v)
                {
                    $res=mysql_query("select * from inbox where id=$v");
                    $a="";
                    $b="";
                    $c="";
                    $d="";
                    $e="";
                    while($rec=mysql_fetch_array($res))
                    {
                        $a=$rec[1];
                        $b=$rec[2];    
                        $c=$rec[3];
                        $d=$rec[4];
                        $e=$rec[5];
                    
                    }
                    mysql_query("insert into trash(too,frm,sub,msg,rel)values('$a','$b','$c','$d','$e')");
                    mysql_query("delete from inbox where id=$v");
                }
                echo " mail deleted successfully";
            }
            ?>

<?php
            $drbut=$_REQUEST['drbut'];
            if($drbut=="deletedraft")
            {
                $ddr=$_REQUEST['ddr'];
                foreach($ddr as $v)
                {
                    $res=mysql_query("select * from draft where id=$v");
                    $a="";
                    $b="";
                    $c="";
                    $d="";
                    $e="";
                    while($rec=mysql_fetch_array($res))
                    {
                        $a=$rec[1];
                        $b=$rec[2];    
                        $c=$rec[3];
                        $d=$rec[4];
                        $e=$rec[5];
                    
                    }
                    mysql_query("insert into trash(too,frm,sub,msg,rel)values('$a','$b','$c','$d','$e')");
                    mysql_query("delete from draft where id=$v");
                }
                echo " mail deleted successfully";
            }
            ?>

            
<?php
            $snbut=$_REQUEST['snbut'];
            if($snbut=="deletesent")
            {
                $dsn=$_REQUEST['dsn'];
                foreach($dsn as $v)
                {
                    $res=mysql_query("select * from sent where id=$v");
                    $a="";
                    $b="";
                    $c="";
                    $d="";
                    $e="";
                    while($rec=mysql_fetch_array($res))
                    {
                        $a=$rec[1];
                        $b=$rec[2];    
                        $c=$rec[3];
                        $d=$rec[4];
                        $e=$rec[5];
                    
                    
                    }
                    mysql_query("insert into trash(too,frm,sub,msg,rel)values('$a','$b','$c','$d','$e')");
                    mysql_query("delete from sent where id=$v");
                }
                echo " mail deleted successfully";
            }
            ?>

            
<?php
            $trbut=$_REQUEST['trbut'];
            if($trbut=="deletetrash")
            {
                $dtr=$_REQUEST['dtr'];
                foreach($dtr as $v)
                {
                    mysql_query("delete from trash where id=$v");
                }
                echo " mail deleted successfully";
            }
            ?>
            <?php
            $ubut=$_REQUEST['ubut'];
            if($ubut=="changepassword")
            {
                $op=$_REQUEST['op'];
                $np=$_REQUEST['np'];
                $cp=$_REQUEST['cp'];
                if($np==$cp)
                {
                    $res=mysql_query("select * from employee where name='$id' and pass='$op'");
                    $c=0;
                    while($rec=mysql_fetch_array($res))
                    {
                        $c=$c+1;
                    }
                    if($c==0)
                    echo "old pass not matched";
                else{
                    mysql_query("update employee set pass='$np' where name='$id'");
                    echo "password updated";
                }
                }
                else
                {
                    echo "New & confirm not matched";

                }
            }
                ?>



<?php
            $inbut=$_REQUEST['trbut2'];
            if($inbut=="restoretrash")
            {
                $din=$_REQUEST['dtr'];
                foreach($din as $v)
                {
                    $res=mysql_query("select * from trash where id=$v");
                    $a="";
                    $b="";
                    $c="";
                    $d="";
                    $e="";
                    while($rec=mysql_fetch_array($res))
                    {
                        $a=$rec[1];
                        $b=$rec[2];    
                        $c=$rec[3];
                        $d=$rec[4];
                        $e=$rec[5];
                    
                    }
                    if($e=="in"){
                    mysql_query("insert into inbox(too,frm,sub,msg,rel)values('$a','$b','$c','$d','$e')");
                    mysql_query("delete from trash where id=$v");
                
                echo " mail restored successfully";
                    }
                    elseif ($e=="dr") {
                        mysql_query("insert into draft(too,frm,sub,msg,rel)values('$a','$b','$c','$d','$e')");
                        mysql_query("delete from trash where id=$v");
                    
                    echo " mail restored successfully";
                        
                    }
                    
                    elseif ($e=="sn") {
                        mysql_query("insert into sent(too,frm,sub,msg,rel)values('$a','$b','$c','$d','$e')");
                        mysql_query("delete from trash where id=$v");
                    
                    echo " mail restored successfully";
                        
                    }
            }
        }
            ?>

            </div>
        </div>
    </div>
</body>
</html>
