<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input = trim(fgets(STDIN));
    $a = trim(substr($input,0,4));
    $b = trim(substr($input,3,6));
    $c = abs((INT)$a-(INT)$b);
    echo $a."\n";
    echo $b."\n";
    echo $c;
?>
