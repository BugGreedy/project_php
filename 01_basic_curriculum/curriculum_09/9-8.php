<?php
$now = new DateTime();
$now ->setTimezone(new DateTimeZone('Asia/Tokyo'));
echo $now ->format('Y-m-d H:i:s')."\n"; 

$now ->modify('+100 days');  //100日後
echo "変更後の時刻は".$now->format('Y-m-d H:i:s')."です。\n";
?>