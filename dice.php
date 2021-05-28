<?php
$dice = dice();

function dice()
{
  echo "---サイコロをふる?(push Y/yes or N/no)\n";
  $push = trim(fgets(STDIN));
  if ($push == "Y" || $push == "yes") {
    $num = rand(1, 6);
    echo "---出た目は..." . $num . "だね\n";
  } elseif ($push == "N" || $push == "no") {
    echo "---Good Bye\n";
  } else {
    echo "---please input correctly\n";
    $dice = dice();
  }
}

$reDice = reDice();

function reDice(){
  echo "---もう一度サイコロをふる？(push Y/yes or N/no)\n";
  $push = trim(fgets(STDIN));
  if ($push == "Y" || $push == "yes") {
    $num = rand(1, 6);
    echo "---出た目は..." . $num . "だね\n";
    $reDice = reDice();
  } elseif ($push == "N" || $push == "no") {
    echo "---Good Bye\n";
  } else {
    echo "---please input correctly\n";
    $reDice = reDice();
  }
}
?>