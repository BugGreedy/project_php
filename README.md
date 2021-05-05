# project_php
このリポジトリはphp基礎学習のために作成。</br>
</br>

## 目次
[はじめに](#はじめに)</br>
[①php基礎](#①php基礎)</br>
[備考メモ](#備考メモ)</br>

</br>


## はじめに
phpはサーバーのドキュメントルート配下にphpを置き、ブラウザから`http://~`の形式でアクセスしないと正しく解釈されない。</br>
直接ブラウザに突っ込んでもソースのみの表示になる。</br>
MAMPなどのディストリビューションの場合はhtdocsの中にディレクトリを置く。</br>
もちろんapacheやDockerなどが起動していないと表示されない。</br>
</br>

## ①php基礎
### 1-1
phpの基本文法
```php
<?php
<?php ?>で囲んだところがphpプログラムの範囲となる。開始タグと終了タグという。
?>
```

### 1-2
echo:出力や表示をする</br>
```php
例：
<?php
echo "hello world";
?>
```

### 1-3
phpは行の終わりに;(セミコロン)を入れる

### 1-4
phpはHTMLと共存できる。
```php
<b>
<?php
echo "ここをボールド体で出力"
?>
</b>
```

### 1-5


## 備考メモ
- `""`(ダブルコーテーション)と`''`(シングルコーテーション)について</br>
  エスケープ文字によって`''`(シングルコーテーション)だと正しく表示されない。</br>
  `""`でくくられた文字列を**二重引用符**という。</br>
  こちら[phpマニュアル 文字列](https://www.php.net/manual/ja/language.types.string.php)を参照。</br>
  下記の改行も二重引用符を用いないと正しく出力されないエスケープシーケンスの一つ。</br>
  </br>
- 改行
  `\n`で改行する。
  ```php
  <?php 
  echo "こんにちは、\nここから２行目です。"
  ?>
  ※ `''`(シングルコーテーション)だと正しく改行されない。
  ```
  </br>
- 変数の代入</br>
  仮に`$sum`という変数に計算式を代入してみる。</br>
  ```php
  $sum = 10+20;
  echo $sum,"\n";
  echo '$sum',"\n";
  echo "$sum","\n";
  ```
  出力結果は
  ```
  30
  $sum
  30
  ```
  となる。</br>
  この事から下記の事がわかる。</br>
  - シングルコーテーションは変数を読めずそのまま文字列として出力している。</br>
  - ダブルコーテーションんは変数の内容を解釈し、その式の解を返してくれる。</br>
  </br>
  