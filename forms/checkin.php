<html>
<head>
<title>Equipment Checkin</title>
<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<div id="outer">
<div id="inner">
<div id="content" style="width:400px;">

<?php
require("../util/db_connect.php");

$coutid=$_GET["coutid"];
$confirm=$_GET["confirm"];
$formState=$_GET["formState"];
$damage=$_GET["damage"];

if(!empty($confirm) && $confirm=="No") {
  //handle the form being cancelled
  echo '<meta http-equiv=\"refresh" content="3; url=checkin.php">';
  echo 'Cancelled checkin; redirecting to checkin main...';
}

if(empty($coutid) && empty($confirm)) {
  //we don't know what's checked out, get the big list
  $SQL="SELECT * FROM checkout WHERE timein IS NULL";
  $itemsout=mysql_query($SQL, $DBCON);

  if(mysql_num_rows($itemsout)==0) {
    echo 'No items are currently checked out';
  } else {

    echo '<table cellpadding=4 border=2>';
    echo '<tr><th>Student Name</th><th>Item</th><th>Action</th></tr>';

    while($row = mysql_fetch_array($itemsout)) {
      $rid=$row["index"];
      $name=$row["name"];
      $stuff=$row["item"];
      
      echo '<tr><td>'.$name.'</td><td>'.$stuff.'</td>';
      echo '<td valign="middle">';
      echo '<form action="checkin.php" method="get">';
      echo '<input name="coutid" type=hidden value="'.$rid.'">';
      echo '<input type=Submit value="Check in">';
      echo '</form></td></tr>';
    }
    
    echo '</table>';
  }
}

if(!empty($coutid) && empty($confirm)) {
  //we now know what was checked out, lets confirm the checkin
  $SQL="SELECT * FROM checkout WHERE `index`=$coutid";
  if(!($row=mysql_query($SQL, $DBCON))) {
      die("row fetch error");
    } else {
      $data=mysql_fetch_array($row);
      echo 'Are you sure you want to check in ' . $data["item"] . " from " . $data["name"];
      echo '<form action="checkin.php" method="get">';
      echo '<input type="hidden" name="coutid" value="'.$coutid.'">';
      echo '<input type="submit" name="confirm" value="No">';
      echo '<input type="submit" name="confirm" value="Yes">';
      echo '</form>';
    }
}

if(!empty($coutid) && $confirm=="Yes" && $formState!="Finish") {
  echo '<form action="checkin.php" method="get">';
  echo '<input type="hidden" name="coutid" value="'.$coutid.'">';
  echo '<input type="hidden" name="confirm" value="'.$confirm.'">';
  echo 'Are any items damaged: <input type="checkbox" name="damage" value="Yes">';
  echo '<input type="submit" name="formState" value="Finish">';
  echo '</form>';
}

if(!empty($formState) && $formState=="Finish") {
  $damage=empty($damage)?false:true;
  $curtime=date("Y-m-d H:i:s");
  $SQL="UPDATE checkout SET damage='$damage', timein='$curtime' WHERE `index`=$coutid";
  if(!mysql_query($SQL, $DBCON)) {
    die("Serious checkin error".mysql_error());
  } else {
    echo 'Commit successful; redirecting...';
    echo '<meta http-equiv="refresh" content="3; url=index.html">';
  }
}
 
mysql_close($DBCON);
?>

</div>
</div>
</div>
</body>
</html>