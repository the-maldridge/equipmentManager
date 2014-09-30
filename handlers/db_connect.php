<?php
$USERNAME="deskworker"
$PASSWORD="foobar"
$DBHOST="localhost"
$DBPORT=
$DBNAME="EQCHECKOUT"


$DBCON = mysqli_connect(DBHOST, USERNAME, PASSWORD, DBNAME);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>