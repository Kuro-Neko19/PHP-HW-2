<?php   
    require_once 'getGenderFromName.php';

    $des = 0;
    $male = 0;
    $female = 0;
    $none = 0;

    do{
       $descrip = $gender[$des];
       if($descrip == -1){$female = $female + 1;}
       if($descrip == 1){$male = $male + 1;}
       if($descrip == 0){$none = $none + 1;}
       $des = $des + 1;
    }
    while($des <= 12);
    
    $femaleP = ($female / 13) * 100;
    $maleP = ($male / 13) * 100;
    $noneP = ($none / 13) * 100;

    echo($male . ' ' . '|' . ' ' . round($maleP, 1) . '%');//Мужчин
    echo($female . ' ' . '|' . ' ' . round($femaleP, 1) . '%');//Женщин
    echo($none . ' ' . '|' . ' ' . round($noneP, 1) . '%');//Н-о
?>