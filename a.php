<?php

$sum = 0;
for($i=10; $i>=1; $i--){
if ($i !=7){
    $sum= $sum + $i;
}
}

$avg = $sum/10;
echo $avg;
?>