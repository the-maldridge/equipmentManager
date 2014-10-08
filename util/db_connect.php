<?php
require("../data/db.conf");

$DBCON = mysql_connect($DBHOST, $USERNAME, $PASSWORD, $DBNAME);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  echo "<br />No use continuing without the database server...";
  die();
} 

if(!mysql_query("USE $DBNAME")) {
  die("did not select database " . mysql_error());
}
?>