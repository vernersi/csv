<?php
require_once "Row.php";

$rows = [];


$row = 1;
if (($handle = fopen("vtmec-causes-of-death(2).csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $num = count($data);
        $row++;
        $causes = explode(';', $data[3]);
        $rows[] = new Row ($data[0], $data[1], $data[2]);


        if ($row > 100) break;
    }
    fclose($handle);
}


/*$date = (string)readline('Enter filter date `YYYY-MM` :');
foreach ($rows as $row) {
    $filtered = $row->filterbyDate($date);
    foreach ($filtered as $line) {
        echo $line.PHP_EOL;
    }
}*/








//var_dump($rows[3]->getDate());

