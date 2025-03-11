
<?php

/*
$sum = 0;
for($i=10; $i>=1; $i--){
if ($i !=7){
    $sum= $sum + $i;
}
}

$avg = $sum/10;
echo $avg;*/

$sum =0;
$vlerat = [7,8,9,14,23,32,45,67,78];
for($i=0; $i<=50;$i++){
    $sum= $sum + $i;

}
  
   if($sum > 50){
        echo "Eshte me i madh se 50" ." ";
   } else {
       echo "Me i vogel 50" ." ";
   } 

   
$avg = $sum/9;
echo $avg;
if($avg %2 == 0){
    echo "Eshte numer cift" ." ";
} else {
    echo "Eshte numer tek" ." ";
} 


$car = ['volovo','fiat','benz'];
$motor = ['ducat','gts','xadv'];

function inspect ($list) {
    echo '<pre>';
    var_dump ($list);
    echo '</pre>';
    
}
inspect ($car);
inspect ($motor);

$mili = ['ol','lo','kl'];
$sulo = ['we','are','true'];

function ins ($jul) {
    echo '<pre>';
    var_dump ($jul);
    echo '</pre>';
    
}
ins ($mili);
ins ($sulo);

$kiki = ['qwer','ert','kjh'];
$uyt = ['mnb','nhy','ewr'];

function mili ($insert) {
    echo '<pre>';
    var_dump($insert);
    echo '</pre>';

}
mili ($kiki);