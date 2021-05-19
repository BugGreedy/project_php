<?php
$array = array(
  '騎士' => 'ブロードソード',
  '呪術師' => '呪術の火',
  '持たざるもの' => 'なし'
);
foreach($array as $key => $value){
  echo $key."の初期装備は<strong>".$value."</strong>です。<br>\n";
}
?>
