例：入力"みかん、ごりら、あんもち"
<?php
$input = trim(fgets(STDIN));
$array = explode('、',$input);
print_r($array);
echo count($array);
?>