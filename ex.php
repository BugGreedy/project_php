<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input = trim(fgets(STDIN));
    $a = trim(substr($input,0,3));
    $b = trim(substr($input,3,3));
    $c = abs((INT)$a-(INT)$b);
    echo $a."\n";
    echo $b."\n";
    echo $c;
?>
