<?php

$item=$_GET["item"];
$formState=$_GET["formState"];

if(empty($item)) {
  echo '<form action="checkout.php" method="get">
    <select name="item">
    <option value="pingpong">Ping Pong</option>
    <option value="pool">Pool</option>
    <option value="foosball">FoosBall</option>
    <option value="kitchen">Kitchen</option>
    <option value="cart">Cart</option>
    <option value="room">Room</option>
    </select>
    <input type="submit" value="Go!">
    </form>';
}

if(empty($formState) && !empty($item)) {
  //send the base form
  echo '<form action="checkout.php" method="get">
    <select name="building">';
  $buildings=file("data/buildings.txt");
  foreach($buildings as $bldgnum => $buildingName) {
    echo '<option value="'.$buildingName.'">'.$buildingName.'</option>';
  }
    echo '</select>
    
    <input type="text" name="name" value="Student Name">
    <input type="text" name="sid" value="Student ID #">
    <input name="item" type="hidden" value="'.$item.'">';
  
  if($item=="pingpong") {
    echo '
    <p>How many Ping Pong balls are being checked out:
    <select name="quantity">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      </select>
      </p>
      <p>How many Ping Pong Paddles are being checked out:
    <select name="players">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      </select>
      </p>';
  } else if($item=="pool") {
    echo '
<input type="hidden" name="quantity" value="1">
<p>How many cues are being checked out:
<select name="players">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
</select>
</p>';
  } else if($item=="foosball") {
    echo '
<input type="hidden" name="quantity" value="1">
<input type="hidden" name="players" value="1">';
  } else if($item=="kitchen") {
    echo '
<input type="hidden" name="quantity" value="1">
<input type="hidden" name="players" value="1">';
  } else if($item=="room") {
    echo '
<select name="quantity">
<option value="0">Classroom</option>
<option value="1">Multipurpose Room (MPR)</option>
</select>
<input type="hidden" name="players" value="1">';
  }    

  //end of form
  echo '<input type="submit" value="Continue!" />
        <input type="hidden" name="formState" value="submit">
        </form>';

} else if($formState=="submit") {
  require("db_connect.php");
  
  $item=mysql_real_escape_string($_GET["item"]);
  $bldg=mysql_real_escape_string($_GET['building']);
  $name=mysql_real_escape_string($_GET['name']);
  $sid=mysql_real_escape_string($_GET['sid']);
  $quantity=mysql_real_escape_string($_GET['quantity']);
  $players=mysql_real_escape_string($_GET['players']);
  
  $SQL = "INSERT INTO checkout (building, name, id, item, quantity, people) VALUES ('$bldg', '$name', '$sid', '$item', '$quantity', '$players')";
  echo "<br />Executing: " . $SQL;
  
  if(!mysql_query($SQL, $DBCON)) {
    die("Error: ".mysql_error($DBCON));
  } else {
    echo "<br />Form success, redirecting to main page...";
    echo '<meta http-equiv="refresh" content="3; url=index.html">';
  }

  mysql_close($DBCON);
}

?>