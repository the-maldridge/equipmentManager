<html>
  <head>
    <title>Ping Pong Checkout</title>
  </head>
  <body>
    <form action="../handlers/parseform.php" method="get">
      <?php require("common.php"); ?>
      <input name="item" type="hidden" value="pingpong">
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
      </p>
    <input type="submit" value="Continue!" />
  </form>
 </body>
</html>
