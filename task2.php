<?php

$chr = 'Z';
$nextChr = ++$chr;               //pre-increment //output= aa
if (strlen($nextChr) > 1){       //built in function to know the string length
  $nextChr = $nextChr[0];        //return the first letter with index 0
}
echo $nextChr;

?>