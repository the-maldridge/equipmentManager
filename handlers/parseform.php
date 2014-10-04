<?php
echo "connecting to database";

require("db_connect.php");
echo "<br />parsing form";

$item=mysql_real_escape_string($_GET['item']);
$bldg=mysql_real_escape_string($_GET['building']);
$name=mysql_real_escape_string($_GET['name']);
$sid=mysql_real_escape_string($_GET['sid']);
$quantity=mysql_real_escape_string($_GET['quantity']);
$players=mysql_real_escape_string($_GET['players']);
echo "<br />values retrieved";

echo <<< DOC
<br />
Form from: $item<br />
building: $bldg<br />
number of items: $quantity<br />
number of players: $players
DOC;

echo "<br />commiting to database";
$SQL = "INSERT INTO checkout (building, name, id, item, quantity, people) VALUES ('$bldg', '$name', '$sid', '$item', '$quantity', '$players')";
echo "<br />Executing: " . $SQL;

if(!mysql_query($SQL, $DBCON)) {
  die("Error: ".mysql_error($DBCON));
}

mysql_close($DBCON);
?>