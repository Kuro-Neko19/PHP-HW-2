<?php
    require_once 'getPartsFromFullName.php';

    $gend = 0;
    $gend1 = 0;
    $gend2 = 0;
    $gend3 = 0;

    $surnamesign1 = "ва"; //признак женской фамилии
    $surnamesign2 = "ич"; //признак мужской фамилии

    $namesign1 = "а"; //признак женского имени
    $namesign2 = "й"; //признак мужского имени
    $namesign3 = "н"; //признак мужского имени
    
    $patronomycsign1 = "вна"; //признак женского отчества
    $patronomycsign2 = "ич"; //признак мужского отчества

    //Отделение окончаний
    do{
        $gendsur = $surname[$gend];
        $gendnam = $name[$gend];
        $gendpatr = $patronomyc[$gend];

        $signsur = mb_substr($gendsur, -2);       
        $signname = mb_substr($gendnam, -1);
        $signpatr = mb_substr($gendpatr, -3);
        $signpatr1 = mb_substr($gendpatr, -2);

     $GFN1 = array($namegend1[$gend] = $signsur);
     $GFN2 = array($namegend2[$gend] = $signname);
     $GFN3 = array($namegend3[$gend] = $signpatr);
     $GFN4 = array($namegend4[$gend] = $signpatr1);

     $gend = $gend + 1;
    }
    while($gend <= 12);
    
    //Сравнение окончаний с признаками
    do{
        $aaa = $namegend1[$gend1];
        if($aaa == $surnamesign1){$ng1 = array($namgen1[$gend1] = 0 - 1);}
        if($aaa == $surnamesign2){$ng1 = array($namgen1[$gend1] = 0 + 1);}
        if($aaa != $surnamesign1 && $aaa != $surnamesign2){$ng1 = array($namgen1[$gend1] = 0);}

        $bbb = $namegend2[$gend1];
        if($bbb == $namesign1){$ng1 = array($namgen2[$gend1] = 0 - 1);}
        if($bbb == $namesign2){$ng1 = array($namgen2[$gend1] = 0 + 1);}
        if($bbb == $namesign3){$ng1 = array($namgen2[$gend1] = 0 + 1);}
        if($bbb != $namesign1 && $bbb != $namesign2 && $bbb != $namesign3){$ng1 = array($namgen2[$gend1] = 0);}

        $ccc = $namegend3[$gend1];
        $ddd = $namegend4[$gend1];
        if($ccc == $patronomycsign1){$ng1 = array($namgen3[$gend1] = 0 - 1);}
        if($ddd == $patronomycsign2){$ng1 = array($namgen3[$gend1] = 0 + 1);}
        if($ccc != $patronomycsign1 && $ddd != $patronomycsign2){$ng1 = array($namgen3[$gend1] = 0);}

        $gend1 = $gend1 + 1;
    }
    while($gend1 <= 12);

    //Суммирование результатов сравнение
    do{
        $GFN5 = array($gender1[$gend2] = $namgen1[$gend2] + $namgen2[$gend2] + $namgen3[$gend2]);

        $gend2 = $gend2 + 1;
    }
    while($gend2 <= 12);

    //Запись результатов в массив
    do{
        $sex = $gender1[$gend3];

        if($sex < 0){$GFN = array($gender[$gend3] = -1);}
        if($sex > 0){$GFN = array($gender[$gend3] = 1);}
        if($sex == 0){$GFN = array($gender[$gend3] = 0);}

        $gend3 = $gend3 + 1;
    }
    while($gend3 <= 12);
?>