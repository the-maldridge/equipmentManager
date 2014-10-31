<?php
function getConfig($path) {
  $file = fopen($path, 'r');
  if($file == false) {
    die("Failed to get config");
  }

  $json = fread($file, filesize($path));
  $data = json_decode($json, true);
  
  return $data;
}

function getItemList($data, $bldg) {
  $groups = str_getcsv($data["buildings"][$bldg]["groups"]);
  
  foreach($groups as $groupIndex) {
    $items[] = $data["groups"][$groupIndex];
  }
  
  return $items;
}

?>