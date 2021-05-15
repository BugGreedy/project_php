  <?php
  $input = trim(fgets(STDIN));
  while ($input) {  // 値が空でない限りループして値を取得し続ける
    $array[] =  $input;
    $input = trim(fgets(STDIN));
  }
  print_r($array);
  
  ?>