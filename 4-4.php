例：入力"ティガ,ナルガ,レウス"
<?php
$input = trim(fgets(STDIN));
$array = explode(",", $input);
$num = count($array);
for ($i = 0; $i <= $num-1; $i++) {
  echo $array[$i] . "さん\n";
}
?>