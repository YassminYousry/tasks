<?php


$units = 250;

if($units <= 50){
  $bill = $units * 3.5;
  echo 'Total Electricity Bill ='. $bill;
}

elseif($units > 50 && $units <= 150){
  $first = 50 * 3.5;
  $last = $units - 50;
  $bill = ($last * 4) + $first;
  echo 'Total Electricity Bill ='. $bill;
}

else {
  $first = 50 * 3.5;
  $second = 100 * 4;
  $last = $units - 150;
  $bill = ($last * 6.5) + $first + $second;
  echo 'Total Electricity Bill ='. $bill;
}


?>