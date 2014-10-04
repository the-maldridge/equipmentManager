<?php
require("handlers/db_connect.php");

$SQL="SELECT * FROM checkout WHERE timein IS NULL";
$itemsout=mysql_query($SQL, $DBCON);

echo "<table>\n";
echo "<tr><td>Student Name</td></tr>\n";

while($row = mysql_fetch_array($itemsout)) {
  $name=$row["name"];
  echo "<tr><td>$name</td></tr>";
}


mysql_close($DBCON);
?>