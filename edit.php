<html>
    <head>
        <title>My first PHP Website</title>
  <style>
  #h { position:absolute;
  margin-top:0px;
  
   margin-left: 500px;
   border-bottom:thick dotted black;
    color: cyan;
    font-family: verdana;
    font-size: 300%;

}
   #notice {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#notice td, #notice th {
    border: 1px solid #ddd;
    padding: 8px;
}

#notice tr:nth-child(even){background-color: #f2f2f2;}

#notice tr:hover {background-color: #ddd;}

#notice th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
#notice #d {
width:60%;
  padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;

}

textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
}

input[type=submit] {position:absolute;
    margin-top: -10px;
    margin-left: 0px;
  
    width: 15%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
  
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
#lo:link, #lo:visited {position:absolute;
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    margin-left: 1050px;
    margin-top: 15px;

    text-align: center;
    text-decoration: none;
    display: inline-block;
}


#lo:hover, #lo:active {
    background-color: red;
}
#ad:link, #ad:visited {position:absolute;
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    margin-left: 10px;
    margin-top: -25px;

    text-align: center;
    text-decoration: none;
    display: inline-block;
}


#ad:hover, #ad:active {
    background-color: red;
}
</style>
    </head>
   <?php
   session_start(); 
   if($_SESSION['user']){  
   }
   else{
      header("location: index.php"); 
   }
   $user = $_SESSION['user']; 
   $id_exists=false;
   ?>
<body>
<h2 id="h">EDIT PAGE</h2>

<a href="logout.php" id="lo">Click here to logout</a><br></br>

<a href="adhome.php" id="ad">Return to Home page</a><br></br>
<h2 align="center">NOTICE BOARD</h2>
<table border="1px" width="100%" id="notice">
<tr>
<th>Id</th>
<th id="d">NOTICE</th>
<th>POST TIME</th>
<th>EDIT TIME</th>
<th>EDIT</th>
<th>DELETE</th>
</tr>
<?php
if(!empty($_GET['id']))
{$id=$_GET['id'];
$_SESSION['id']=$id;
$id_exists=true;
mysql_connect("localhost","root","")or die (mysql_error());
mysql_select_db("first_db")or die("cannot connect to database");
$query=mysql_query("Select * from list where id='$id'" );
$count=mysql_num_rows($query);
if($count>0)
{
  while($row=mysql_fetch_array($query))
{Print "<tr>";
  Print '<td align="center">'. $row['id']."</td>";
  Print '<td align="center">'. nl2br($row['details'])."</td>";
  Print '<td align="center">'. $row['date_posted'] . "  " .$row['time_posted']."</td>";
  Print '<td align="center">'. $row['date_edited']." " . $row['time_edited']."</td>";
  Print "</tr>";

}

}
else
{
  $id_exists=false;
}
}
?>
</table>
<br></br>
<?php
if($id_exists)
{
  Print '<form action="edit.php" method="POST">
<textarea placeholder="ENTER NEW NOTICE:" rows="4" columns="50" id=textin name="details"></textarea><br></br>
<input type="submit" value="Add Notice">
</form>

  ';

}
else
{
  Print '<h2 align="center" >THERE IS NO DATA TO BE EDITED.</h2>';

}
?>
</body>
</html>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
$details=nl2br(mysql_real_escape_string($_POST['details']));
mysql_connect("localhost","root","")or die (mysql_error());
mysql_select_db("first_db")or die("cannot connect to database");
$id=$_SESSION['id'];
$time = strftime("%X"); 
    $date = strftime("%B %d, %Y"); 
    mysql_query("UPDATE list SET details='$details', date_edited='$date' , time_edited='$time' where id='$id'");
   
    header("location:adhome.php");
  }
  ?>