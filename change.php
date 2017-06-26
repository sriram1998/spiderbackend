<html>
    <head>
        
        <title>My first PHP Website</title>
        <body>
            <form action="change.php" method="POST">
            <input type="text" name="username2" placeholder="username" required="required"> <br></br>
            <input type="submit" value="CHANGE ACCESS LEVEL OF THIS USER">
            </form>
         <h2 align="center">USERS' LIST(access lvl=0:admin)</h2>
<table border="1px" width="100%" id="notice">
<tr>

<th id="d">USERNAME</th>
<th>ACCESS LEVEL</th>
</tr>
<?php

mysql_connect("localhost","root","")or die (mysql_error());
mysql_select_db("first_db")or die("cannot connect to database");
$query=mysql_query("Select * from users");
$count=mysql_num_rows($query);
if($count>0)
{
  while($row=mysql_fetch_array($query))
{Print "<tr>";
  Print '<td align="center">'. $row['username']."</td>";
  Print '<td align="center">'. $row['a']."</td>";
  
  Print "</tr>";

}

}

?>
</table>
<br></br>
         </body>
     </head>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$username=mysql_real_escape_string($_POST['username2']);
$password=2;


$a=0;

mysql_connect("localhost","root","")or die (mysql_error());
mysql_select_db("first_db")or die("cannot connect to database");
$query=mysql_query("Select * from users");


  mysql_query("UPDATE users SET a='$a' where username='$username'");
  
  Print '<script>alert("MADE ADMIN");</script>';
  Print '<script>window.location.assign("adhome.php");</script>';



}
?>