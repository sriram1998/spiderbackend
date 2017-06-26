# spiderbackend
the tables and database will be created once the index page is loaded.


sql query for initial admin

$sql = "INSERT INTO users (username,password,a)  //a is the access level(i.e) a=0 means admin and a=1 means student
VALUES ('admin', 'root', 0)";

kindly insert the admin user at the beginning.

an admin can add notice,edit them and make other users admin.


