<? php require("db_connect.php");

$item=mysqli_real_escape_string($DBCON, $_GET['item']);
$bldg=mysqli_real_escape_string($DBCON, $_GET['buiing']);
$name=mysqli_real_escape_string($DBCON, $_GET['name']);
$sid=mysqli_real_escape_string($DBCON, $_GET['sid']);
$quantiy=mysqli_real_escape_string($DBCON, $_GET['quantity']);
$players=mysqli_real_escape_string($DBCON, $_GET['players']);

echo <<< DOC
Form from: $item<br />
building: $bldg<br />
number of items: $quantity<br />
number of players: $players
DOC;

?>