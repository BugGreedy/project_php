<?php
echo "start\n";
try {
  $date = new DateTime("202x-01-01");
  echo $date->format('Y/m/d')."\n";
} catch (Exception $e) {
  // echo $e->getMessage()."\n";
  echo "指定された日付が不正です。\n";
  // echo "発生した例外：",$e,"\n";
  fputs(STDERR,$e->getMessage()."\n");
} finally {
  echo "end\n";
}
?>
