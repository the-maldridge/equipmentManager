<html>
  <head>
    <title>Equipment Checkout</title>
<link rel="stylesheet" type="text/css" href="../assets/style.css">
  </head>
  <body>
<div id="outer">
<div id="inner">
   <div id="content" style="width:400px;">
<?php
//this file contains huge echoing sections of html, you've been warned


//figure out where we are in the process
$item=$_GET["item"];
$formState=$_GET["formState"];


if(empty($item)) {
  //we don't currently have state, so send the initial form data
  echo '<form action="checkout.php" method="get">';
  echo '<select name="item">';
  echo '<option value="pingpong">Ping Pong</option>';
  echo '<option value="pool">Pool</option>';
  echo '<option value="foosball">FoosBall</option>';
  echo '<option value="kitchen">Kitchen</option>';
  echo '<option value="cart">Cart</option>';
  echo '<option value="room">Room</option>';
  echo '</select>';
  echo '<input type="submit" value="Go!">';
  echo '</form>';
}

if(empty($formState) && !empty($item)) {
  //we have the item data, but still don't have initial state
  //need to send the checkout form
  echo '<form action="checkout.php" method="get">';

  //get the buildings from a data file
  echo '<select name="building">';
  $buildings=file("data/buildings.txt");
  foreach($buildings as $bldgnum => $buildingName) {
    $buildingName=trim($buildingName);
    echo '<option value="'.$buildingName.'">'.$buildingName.'</option>';
  }
  echo '</select>';

  //get resident information
  echo '<input type="text" name="name" value="Student Name">';
  echo '<input type="text" name="sid" value="Student ID #">';

  //keep track of what we are checking out
  echo '<input name="item" type="hidden" value="'.$item.'">';
  

  //send form specializations
  if($item=="pingpong") {
    echo '<p>How many Ping Pong balls are being checked out:';
    echo '<select name="quantity">';
    echo '<option value="1">1</option>';
    echo '<option value="2">2</option>';
    echo '<option value="3">3</option>';
    echo '</select>';
    echo '</p>';
    echo '<p>How many Ping Pong Paddles are being checked out:';
    echo '<select name="players">';
    echo '<option value="1">1</option>';
    echo '<option value="2">2</option>';
    echo '<option value="3">3</option>';
    echo '<option value="4">4</option>';
    echo '<option value="5">5</option>';
    echo '<option value="6">6</option>';
    echo '</select>';
    echo '</p>';

  } else if($item=="pool") {
    echo '<input type="hidden" name="quantity" value="1">';
    echo '<p>How many cues are being checked out:';
    echo '<select name="players">';
    echo '<option value="1">1</option>';
    echo '<option value="2">2</option>';
    echo '<option value="3">3</option>';
    echo '<option value="4">4</option>';
    echo '</select>';
    echo '</p>';

  } else if($item=="foosball") {
    echo '<input type="hidden" name="quantity" value="1">';
    echo '<input type="hidden" name="players" value="1">';

  } else if($item=="kitchen") {
    echo '<input type="hidden" name="quantity" value="1">';
    echo '<input type="hidden" name="players" value="1">';

  } else if($item=="room") {
    //couldn't come up with a good solution for rooms, elected to use an ENUM based system
    //will parse it out in a report if needed
    echo '<select name="quantity">';
    echo '<option value="0">Classroom</option>';
    echo '<option value="1">Multipurpose Room (MPR)</option>';
    echo '</select>';
    echo '<input type="hidden" name="players" value="1">';
  }    

  //all specializations have been sent, send a closing out for the form
  echo '<input type="submit" value="Continue!" />';
  echo '<input type="hidden" name="formState" value="submit">';
  echo '</form>';


} else if($formState=="submit") {
  //form state has been aquired at finish state

  //time to access the database
  require("../util/db_connect.php");
  
  //escape anything odd in the input strings
  $item=mysql_real_escape_string($_GET["item"]);
  $bldg=mysql_real_escape_string($_GET['building']);
  $name=mysql_real_escape_string($_GET['name']);
  $sid=mysql_real_escape_string($_GET['sid']);
  $quantity=mysql_real_escape_string($_GET['quantity']);
  $players=mysql_real_escape_string($_GET['players']);
  
  //compose the SQL for the query
  $SQL = "INSERT INTO checkout (building, name, id, item, quantity, people) VALUES ('$bldg', '$name', '$sid', '$item', '$quantity', '$players')";
    echo "Attempted to run ".$SQL."\n";
  if(!mysql_query($SQL, $DBCON)) {
    echo "Attempted to run ".$SQL."\n";
    die("Error: ".mysql_error($DBCON));
  } else {
    echo "<br />Form success, redirecting to main page...";
    echo '<meta http-equiv="refresh" content="3; url=index.html">';
  }

  //remember to close out the database uplink
  mysql_close($DBCON);
}
?>
</div>
</div>
</div>
</body>
</html>