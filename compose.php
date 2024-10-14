<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Form</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="compose2.css">
</head>
<body>

    <div class="email-form">
        <h2>Email Form</h2>
        <form action=home.php>
            <label for="to">To:</label>
            <input type="text" id="to" name="too" placeholder="Recipient's email" >

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="sub" placeholder="Email subject" required>

            <label for="message">Message:</label>
            <textarea id="message" name="msg" placeholder="Write your message here..." rows="5" required style="width: 1136px; height: 387px;"></textarea>

            <!-- Submit Button -->
            <button type="submit" name="sbut" value="Save" >save</button>
            <!-- Reset Button -->
            <input type="submit" class="reset-button" name="sbut" value="Send">
        </form>
    </div>

</body>
</html>
<?php
// mysql_connect("localhost","root",null);
// mysql_select_db("info");

// $too=$_REQUEST['too'];
// $frm=$_REQUEST['frm'];
// $sub=$_REQUEST['sub'];
// $msg=$_REQUEST['msg'];

// $but=$_REQUEST['but'];
// echo "hello abhi";

// if($but=="insert")
// {

//     mysql_query("insert into compose(id,too,frm,sub,msg)values('$id'$too',$frm,$sub,$msg)");
//     echo "Record added successfully";
// }
// else if ($but=="select") {
//    $res= mysql_query("select* from emp where name='$name'");
//     while($rec=mysql_fetch_array($res))
//     {
//         echo$rec[0]." ".$rec[1]." ".$rec[2]." ".$rec[3]."<br> ";
    
//     }
    
// }
// else if ($but=="update") {
//     mysql_query("update emp set age=$age, salary=$salary,emp_id=$emp_id where name='$name'");
//     echo "record updated successfully ";
    
// }
// else if ($but=="delete") {
//     mysql_query("delete from emp where name='$name'");
//     echo"record deleted from data base";
    
// }
?>
