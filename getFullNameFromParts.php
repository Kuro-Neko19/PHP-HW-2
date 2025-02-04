<?php
    require_once 'getPartsFromFullName.php';

    $wcell = 0;
    do{
        $sur = $surname[$wcell];
        $nam = $name[$wcell];
        $patr = $patronomyc[$wcell];
        $fullNFP = array($fullN[$wcell] = $sur . ' ' . $nam . ' ' . $patr);
        $wcell = $wcell + 1;
    }
    while($wcell <= 12);
?>