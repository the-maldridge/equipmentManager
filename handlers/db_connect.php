<?php
$USERNAME="deskworker";
$PASSWORD="foobar";
$DBHOST="localhost";
$DBPORT=3306;
$DBNAME="EQCHECKOUT";

echo "php is running";

$DBCON = mysql_connect($DBHOST, $USERNAME, $PASSWORD, $DBNAME);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  echo "<br />No use continuing without the database server...";
  die();
} else {
echo "<p>db success</p>";
}
?>