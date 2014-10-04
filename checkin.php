<?php
require("handlers/db_connect.php");

$SQL="SELECT * FROM checkout WHERE timein IS NULL";
$itemsout=mysql_query($SQL, $DBCON);

echo "<table cellpadding=4>\n";
echo "<tr><th>Student Name</th><th>Item</th><th>Action</th></tr>\n";

while($row = mysql_fetch_array($itemsout)) {
  $rid=$row["index"];
  $name=$row["name"];
  $stuff=$row["item"];

  echo "<tr><td>$name</td><td>$stuff</td>";
  echo "<td valign=\"middle\"><form action=\"checkin.php\" method=\"get\">\n";
  echo "\t<input type=hidden value=$rid>\n";
  echo "\t<input type=Submit value=\"Check in\">\n";
  echo "</form></td></tr>\n";
}
echo "</table>";


mysql_close($DBCON);
?>