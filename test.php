<?php

$getJsonData = file_get_contents('http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz');
$file = fopen('test.txt','w');
fwrite($file, $getJsonData);
fclose($file);

////////////////////////////////

$file = fopen('test.txt','r');
$read_data = fread($file, filesize('test.txt'));

/////////////////////////////////////////////////////////

$convert_dataArray = json_decode($read_data,true);
foreach($convert_dataArray['data'] as $key => $value){
  print_r($value);
//foreach($value as $key1 => $value1){
    //print_r($value1);
 // }
 }





?>