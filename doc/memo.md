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
    - ダブルコーテーションんは変数の内容を解釈し、その式の解を返す。</br>
    </br>

  ここまでの内容からダブルコーテーションを常用した方が便利に思えるかもしれない。しかし、その便利さゆえに記述者の思ったとおりの動きにならない場合がある。</br>
  以下はその一例。
  ```php
  <?php
  $sum = 10 + 20;
  echo "$sumの内容は、$sumです。";
  ?>
  ```
  この出力結果はエラーとなる。これはphpの文法上、英語以外でも変数にできることから`$sumの内容は、`という変数に解釈されたからである。</br>
  これを回避するために下記のような書き方がある。</br>
  ```php 
  echo "\$sumの内容は、{$sum}です。";
  ```
  この出力結果は`$sumの内容は、30です。`となる。解説は下記を参照。</br>
  - $を文字として出力したいときは二重引用符で機能するエスケープ文字`\$`を使用する。</br>
  - `{}`で変数を囲う事で多言語同様にここを変数として解釈し、処理する事ができる。</br>  
  </br>
  以上のような事から、普段の引用はシングルコーテーションを用い、何か目的がある時のみダブルコーテーションを用いる事が望ましい。</br>
  </br>