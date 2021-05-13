<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input = trim(fgets(STDIN));
    $a = trim(substr($input,0,3));
    $b = trim(substr($input,4,4));
    $c = abs((INT)$a-(INT)$b);
    echo $a;
    echo $b;
    echo $c;
?>