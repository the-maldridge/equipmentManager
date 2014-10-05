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
    <select name="building">
    <option value="RHS">Residence Hall South</option>
    <option value="RHN">Residence Hall North</option>
    <option value="RHW">Residence Hall West</option>
    <option value="RHSW">Residence Hall SouthWest</option>
    <option value="RHNW">Residence Hall NorthWest</option>
    </select>

    <input type="text" name="name" value="Student Name">
    <input type="text" name="sid" value="Student ID #">
    <input name="item" type="hidden" value="$item">';
  
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
  }

  //end of form
  echo '<input type="submit" value="Continue!" />
      </form>';
}

?>