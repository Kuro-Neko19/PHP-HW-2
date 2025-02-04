<?php
    require_once '/getPartsFromFullName.php';
    $short = 0;
    do{
      $Ssurname = $surname[$short];
      $Sname = mb_substr($name[$short], 0, 1);
      $shortSN = array($shortf[$short] = $Ssurname . ' ' . $Sname . '.');
      $short = ($short + 1);
    }
    while($short <= 12);
?>