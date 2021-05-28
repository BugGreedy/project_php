<!-- 6-5_演習課題3
各要素を3倍にして新しい配列を作成する -->


<?php
$numbers = [12, 34, 56, 78, 90];

// ここに、各要素を3倍にして新しい配列を作成するコードを記述する
foreach($numbers as $value){
  $numbers2[] = $value * 3;
}
print_r($numbers2);
?>