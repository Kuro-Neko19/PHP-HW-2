<?php
    require_once(realpath('Functions/DataBase/PersonsArray.php'));
    $cell = 0;
    do{
      $PartsFromName = explode(' ', $fullname[$cell]);
      $partsurname = array($surname[$cell] = $PartsFromName[0]);
      $partname = array($name[$cell] = $PartsFromName[1]);
      $partpatronomyc = array($patronomyc[$cell] = $PartsFromName[2]);
      $cell = ($cell + 1);
    }
    while($cell <= 12);
?>