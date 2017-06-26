<?php
    session_start();
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }

    if($_SERVER['REQUEST_METHOD']="POST")
    {$details = nl2br(mysql_real_escape_string($_POST['details']));
    $time = strftime("%X"); 
    $date = strftime("%B %d, %Y"); 
    mysql_connect("localhost","root","")or die (mysql_error());
    mysql_select_db("first_db")or die("cannot connect to databse");
    mysql_query("INSERT INTO list (details,date_posted,time_posted) VALUES ('$details','$date','$time')");
    header("location:adhome.php");}
    else
    {
        header("location:adhome.php");
    }


?>