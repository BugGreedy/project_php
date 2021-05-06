<?php
$apple = 350;
$apple_num = rand(1,10);
echo 'りんごの金額は'.$apple."です。\n";
echo 'りんごを買う数は'.$apple_num."です。\n";
$total = $apple * $apple_num;
echo '合計金額は'.$total.'です。';
?>