<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];


function getPartsFromFullname($example_persons_array){
    global $fio;
for ($i = 0; $i <= 10; $i++){
    
    $fullnames = explode(" ", $example_persons_array[$i]["fullname"]);
$fio[$i]['surname'] = $fullnames[0];
$fio[$i]['name'] = $fullnames[1];
$fio[$i]['patronomyc'] = $fullnames[2];
}
}

getPartsFromFullname($example_persons_array);

function getFullnameFromParts($fio){
    global $imya;
    for ($i = 0; $i <= 10; $i++){
        $imya[$i] = $fio[$i]['surname'].' '.$fio[$i]['name'].' '.$fio[$i]['patronomyc'];
}
}
getFullnameFromParts($fio);

function getShortName($fio){
    global $short;
    for ($i = 0; $i <= 10; $i++){
        $str = iconv('UTF-8', 'windows-1251', $fio[$i]['surname']); 
        $str = substr($str , 0 , 1);
$str = iconv('windows-1251','UTF-8',$str);
        
        $short[$i] = $fio[$i]['name'].' '.$str.'.';
     echo $short[$i];
     echo "<br>";
}
}
getShortName($fio);

echo "<br>";
echo "Определение пола по ФИО";
echo "<br>";

function getGenderFromName($fio){
    global $pol;
    for ($i = 0; $i <= 10; $i++){
    $female1 = mb_substr($fio[$i]['patronomyc'], -3);
    if ($female1 == "вна") {
        $female1 = 1;
    }
    else {
        $female1 = 0;
    }

    $female2 = mb_substr($fio[$i]['name'], -1);
    if ($female2 == "а") {
        $female2 = 1;
    }
    else {
        $female2 = 0;
    }

    $female3 = mb_substr($fio[$i]['surname'], -2);
    if ($female3 == "ва") {
        $female3 = 1;
    }
    else {
        $female3 = 0;
    }

    $male1 = mb_substr($fio[$i]['patronomyc'], -2);
    if ($male1 == "ич") {
        $male1 = 1;
    }
    else {
        $male1 = 0;
    }

    $male2 = mb_substr($fio[$i]['name'], -1);
    if ($male2 == "й" || "н") {
        $male2 = 1;
    }
    else {
        $male2 = 0;
    }

    $male3 = mb_substr($fio[$i]['surname'], -1);
    if ($male3 == "в") {
        $male3 = 1;
    }
    else {
        $male3 = 0;
    }

    $sumPrPola = 0;
    $gender = $sumPrPola - $female1 - $female2 - $female3 + $male1 + $male2 + $male3;

if ($gender >= 1) {
    $gender = 'мужской';
}
elseif ($gender < 0){
    $gender = 'женский';
}
else {$gender = 'неопределенный пол';
}
echo "<br>";
$pol[$i] = $gender;
echo $pol[$i];
}}

getGenderFromName($fio);

for ($i = 0; $i <= 10; $i++){
    $fio[$i]['pol'] = $pol[$i];
}
echo "<br>";
//Определение возрастно-полового состава
echo "<br>";
echo "Определение возрастно-полового состава";
echo "<br>";
function getGenderDescription ($pol) {
    global $myg;
    global $gen;
    global $neo;
    for ($i = 0; $i <= 10; $i++){

        if ($fio[$i]['pol'] = 'мужской'){
            $myg = $myg++;
        }
        if ($fio[$i]['pol'] = 'женский'){
            $gen = $gen++;
        }
        if ($fio[$i]['pol'] = 'неопределенный пол'){
            $neo = $neo++;
        }
}};

//$getGender = array_filter($pol, function($pol) {
    //return $pol == 0;
//});
//print_r($getGender);

$myg = array_filter($pol, function($getMyg) {
    return ($getMyg) == 'мужской';
});

$gen = array_filter($pol, function($getGen) {
    return ($getGen) == 'женский';
});

$neo = array_filter($pol, function($getNeo) {
    return ($getNeo) == 'неопределенный пол';
});

//$array_length = count($pol);
//for ($i = 0; $i < $array_length; $i++) {
  //echo $pol[$i];
  //echo '<br>';
//}
$getGenderM = count($myg);
$getGenderG = count($gen);
$getGenderN = count($neo);

$allGen = count($pol);

$m = $getGenderM / $allGen * 100;
$g = $getGenderG / $allGen * 100;
$n = $getGenderN / $allGen * 100;
echo '<br>';
echo 'Мужчины' . ' - ' . round($m, 1) . '%';
echo '<br>';
echo 'Женщины' . ' - ' . round($g, 1) . '%';
echo '<br>';
echo 'Не удалось определить' . ' - ' . round($n, 1) . '%';
echo '<br>';

getGenderDescription ($pol);

?>
<?php
echo $first_float_variable = 0.1;
$second_float_variable = 1/5;
$third_float_variable = 1/3;
$fourth_float_variable = 31e-2;

var_dump ($first_float_variable);
var_dump ($second_float_variable);
var_dump ($third_float_variable);
var_dump ($fourth_float_variable);
var_dump ($first_float_variable + $second_float_variable);

?>

</body>
</html>
