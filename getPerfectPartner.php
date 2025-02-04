<?php
    require_once 'Functions/Splite_and_Merge/getPartsFromFullName.php';
    require_once 'Functions/Splite_and_Merge/getFullNameFromParts.php';
    require_once 'getShortName.php';
    require_once 'PerfectCouple.php';

    //объявление переменных для циклов
    $int = 0;

    //объявление строковых переменных
    $inputsurPC = "null";//Фамилия
    $inputnamPC = "null";//Имя
    $inputpatrPC = "null";//Отчество

    //номер ячейки массива с выбраным партнёром
    $perfpart = 0;

    //Изменение регистра
    strtolower($inputsurPC);
    strtolower($inputnamPC);
    strtolower($inputpatrPC);
    ucfirst($inputsurPC);
    ucfirst($inputnamPC);
    ucfirst($inputpatrPC);

    //проверка на наличие чисел
    do{
        if(strstr($inputsurPC, $int) == false){$perm3 = $perm3 + 0;}
        if(strstr($inputsurPC, $int) !== false){$perm3 = $perm3 + 1;}

        if(strstr($inputnamPC, $int) == false){$perm3 = $perm3 + 0;}
        if(strstr($inputnamPC, $int) !== false){$perm3 = $perm3 + 1;}

        if(strstr($inputpatrPC, $int) == false){$perm3 = $perm3 + 0;}
        if(strstr($inputpatrPC, $int) !== false){$perm3 = $perm3 + 1;}
        
        $int = $int + 1;
       }
    while($int <= 9);

    //определение пола
    if($perm3 == 0){
        $PCsignsur = mb_substr($inputsurPC, -2);       
        $PCsignname = mb_substr($inputnamPC, -1);
        $PCsignpatr = mb_substr($inputpatrPC, -3);
        $PCsignpatr1 = mb_substr($inputpatrPC, -2);

        if($PCsignsur == "ва"){$PCgender1 = 0 - 1;}
        if($PCsignsur == "ич"){$PCgender1 = 0 + 1;}
        if($PCsignsur !== "ва" && $PCsignsur !== "ич"){$PCgender1 = 0;}

        if($PCsignname == "а"){$PCgender2 = 0 - 1;}
        if($PCsignname == "й"){$PCgender2 = 0 + 1;}
        if($PCsignname == "н"){$PCgender2 = 0 + 1;}
        if($PCsignname !== "а" && $PCsignname !== "й" && $PCsignname !== "н"){$PCgender2 = 0;}

        if($PCsignpatr == "вна"){$PCgender3 = 0 - 1;}
        if($PCsignpatr1 == "ич"){$PCgender3 = 0 + 1;}
        if($PCsignpatr !== "вна" && $PCsignpatr1 !== "ич"){$PCgender3 = 0;}

        $PCgender = ($PCgender1 + $PCgender2 + $PCgender3);

        if($PCgender < 0){$PCgender = -1;}
        if($PCgender > 0){$PCgender = 1;}
        if($PCgender == 0){$PCgender = 0;}
    }

    //сравнение партнёров
    if($PCgender !== $gender[$perfpart]){
    $rand = mt_rand(5000, 10000);
    $random = $rand / 100;
    $SPCname = mb_substr($inputnamPC, 0, 1);
    echo($inputsurPC . ' ' . $SPCname . '.' . ' ' . '+' . ' ' . $shortf[$perfpart] . ' ' . '=' . ' ' . $random . '%');
    }
    if($PCgender == $gender[$perfpart]){
        echo('Ошибка в выборе партнёра!');
    }