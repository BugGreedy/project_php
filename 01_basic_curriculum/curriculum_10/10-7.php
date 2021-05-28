<?php
function test_exception($date){
  echo "2\n";
  try {
    echo "3\n";
    return new DateTime($date);
    echo "4\n";
  } catch (Exception $e){
    echo "5\n";
    throw $e;
  }
  echo "6\n";
}

echo "1\n";

try {
  $dateTime = test_exception('199x-01-01');
  echo "7\n";
} catch (Exception $e){
  echo "8\n";
}
echo "9\n";
?>