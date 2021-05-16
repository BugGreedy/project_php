<?php
//入力：もぐら、こうもり、らくだ、かめごろう、かめっくす
$input = trim(fgets(STDIN));
$member = explode("、",$input);
print_r($member);
$max = count($member)-1;
$key = rand(0,$max);
echo $key.':'.$member[$key];
?>