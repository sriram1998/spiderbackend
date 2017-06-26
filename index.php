<html>
    <head>
    <title>My first PHP Website</title>
    <style>
#l:link, #l:visited {position:absolute;
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    margin-left: 500px;
    margin-top: 250px;

    text-align: center;
    text-decoration: none;
    display: inline-block;
}


#l:hover, #l:active {
    background-color: red;
}
#r:link, #r:visited {position:absolute;
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    margin-left: 500px;
    margin-top: 300px;

    text-align: center;
    text-decoration: none;
    display: inline-block;
}


#r:hover, #r:active {
    background-color: red;
}

h2 { position:absolute;
	 margin-left: 250px;
	 border-bottom:thick dotted black;
    color: green;
    font-family: verdana;
    font-size: 300%;

}

</style>
    </head>
    <body background="bgs.png">
    
   <a href="login.php" id="l">click here to login</a><br></br>
   <a href="register.php" id="r">click here to register</a>
   <h2>ONLINE NOTICE BOARD</h2>
    </body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE first_db";
if ($conn->query($sql) === TRUE) {
   
} else {
   
}

$conn->close();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "first_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table users
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
a VARCHAR(50)
)";
if ($conn->query($sql) === TRUE) {
   
} else {
  
}






mysqli_close($conn);

?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "first_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE  list (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
details text NOT NULL,
date_posted VARCHAR(30) NOT NULL,
time_posted time,
date_edited VARCHAR(30) NOT NULL,
time_edited time
)";
if ($conn->query($sql) === TRUE) {
    
} else {
   
}

mysqli_close($conn);
?>
