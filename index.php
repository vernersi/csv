<?php
require_once "Row.php";
require_once "DeathCollection.php";

$rows = new DeathCollection();
$row = 1;
if (($handle = fopen("vtmec-causes-of-death(2).csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $num = count($data);
        $row++;
        $causes = explode(';', $data[3]);
        $rows->add(new Row ($data[0], $data[1], $data[2], array_filter($causes)));
       // if ($row > 1000) break;
    }
    fclose($handle);
}

while (true){
    echo "[1] Get Count of each Death type".PHP_EOL.
        "[2] Sort by Date".PHP_EOL.
        "[3] Top Common Cause!".PHP_EOL.
        "[4] Display for all cases".PHP_EOL.
        "[5] Exit!".PHP_EOL;
    $selection = readline("Enter Selection :");
    switch ($selection){
        case 1: foreach ($rows->filterByDeath() as $key=>$value){
            echo $key." : ".$value.PHP_EOL;
        }break;

        case 2: $date = readline('Enter filter date `YYYY-MM` :');
        foreach ($rows->getDeaths() as $death){
            $filtered = $death->filterByDate($date);
                foreach($filtered as $value){
                    echo $value.PHP_EOL;
                }
            } break;

        case 3: $death = readline('Enter death Type :');
            echo $rows->getDeathCount($death).PHP_EOL;
            break;
        case 4: foreach ($rows->getDeaths() as $death){
            echo "Datums :".$death->getDate()." Naaves iemesls :".$death->getDeathType()." | ".$death->getDeaths().PHP_EOL;
        }break;
        case 5: exit;
    }
}














