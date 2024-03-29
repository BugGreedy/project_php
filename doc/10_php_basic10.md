## PHP入門編10:例外処理を理解しよう

### 目次
[10-1_例外処理の概要を理解しよう](#10-1_例外処理の概要を理解しよう)</br>
[10-2_簡単な例外処理をしてみよう](#10-2_簡単な例外処理をしてみよう)</br>
[10-3_いろいろな書式で例外に対応しよう](#10-3_いろいろな書式で例外に対応しよう)</br>
[10-4_throwで意図的に例外を投げよう](#10-4_throwで意図的に例外を投げよう)</br>
[10-5_発生させる例外を変えてみよう](#10-5_発生させる例外を変えてみよう)</br>
[10-6_複数の例外を捕捉してみよう](#10-6_複数の例外を捕捉してみよう)</br>
[10-7_例外処理の呼び出し元に任せよう](#10-7_例外処理の呼び出し元に任せよう)</br>
[10-8_finallyをもっと理解しよう](#10-8_finallyをもっと理解しよう)</br>


***

### 10-1_例外処理の概要を理解しよう
**よく目にするエラー**
- `E_PARSE`</br>
  コードが文法的に誤っているときに発生。</br>
  一切の処理をしない。</br>
  </br>
- `E_ERROR`</br>
  処理を継続することが不可能になった時に発生。</br>
  発生したところで処理を停止する。</br>
  </br>
- `E_WARNING`</br>
  処理を継続することは可能だが、想定外の問題が起こったときに発生。</br>
  </br>
- `E_NOTICE`</br>
  処理を継続することは可能だが、想定内の問題が起こったときに発生。</br>
</br>

例：定義していない変数を出力してみる。
```php
<?php
echo 'start'."\n";
$a = 1;
echo $b;
echo "end"
?>
```
↓出力結果
```
start

Warning: Undefined variable $b in /Applications/MAMP/htdocs/project_php/10-1.php on line 4

Call Stack:
    0.0005     395216   1. {main}() /Applications/MAMP/htdocs/project_php/10-1.php:0

PHP Warning:  Undefined variable $b in /Applications/MAMP/htdocs/project_php/10-1.php on line 4
PHP Stack trace:
PHP   1. {main}() /Applications/MAMP/htdocs/project_php/10-1.php:0
end
```
↑のように`PHP Warning:`とエラーメッセージが出る。</br>
`Warning`なのでエラーは発生したが処理は最後まで行われており、`start`と`end`は出力されている。</br>
</br>

次に`echo $b;`のセミコロンをとって実行してみる。</br>
```php
<?php
echo 'start'."\n";
$a = 1;
echo $b
echo "end"
?>
```
↓出力結果
```
PHP Parse error:  syntax error, unexpected token "echo", expecting "," or ";" in /Applications/MAMP/htdocs/project_php/10-1.php on line 5

Parse error: syntax error, unexpected token "echo", expecting "," or ";" in /Applications/MAMP/htdocs/project_php/10-1.php on line 5
```
今度は`Parse error`がエラーメッセージとして出力された。</br>
文法的に間違っているから処理が実行されていない。</br>
</br>

次に架空の時刻を出力しようとしてみる。
```php
<?php
echo 'start'."\n";
$date = new DateTime("200x-01-01");
echo "end"
?>
```
↓出力結果
```
start
PHP Fatal error:  Uncaught Exception: DateTime::__construct(): Failed to parse time string (200x-01-01) at position 0 (2): Unexpected character in /Applications/MAMP/htdocs/project_php/10-1.php:3
Stack trace:
#0 /Applications/MAMP/htdocs/project_php/10-1.php(3): DateTime->__construct('200x-01-01')
#1 {main}
  thrown in /Applications/MAMP/htdocs/project_php/10-1.php on line 3

Fatal error: Uncaught Exception: DateTime::__construct(): Failed to parse time string (200x-01-01) at position 0 (2): Unexpected character in /Applications/MAMP/htdocs/project_php/10-1.php on line 3

Exception: DateTime::__construct(): Failed to parse time string (200x-01-01) at position 0 (2): Unexpected character in /Applications/MAMP/htdocs/project_php/10-1.php on line 3

Call Stack:
    0.0007     395336   1. {main}() /Applications/MAMP/htdocs/project_php/10-1.php:0
    0.0028     395416   2. DateTime->__construct($datetime = '200x-01-01') /Applications/MAMP/htdocs/project_php/10-1.php:3
```
今回は`Fatal error`とメッセージが出た。</br>
最初の`start`のみ出力されて、架空の日付のオブジェクトを生成するところで処理が止まっている。</br>
</br>

上記のような実行時のエラーを**例外**と呼び、それらが発生した際に行う処理の事を**例外処理**という。</br>
</br>

**例外処理(Exception)の機能**
- try</br>
  あらかじめコードを指定して、プログラム実行時に処理の問題を検出。</br>
  </br>
- catch</br>
  問題を検出した際、どのように対応するか記述しておく。</br>
  </br>
- throws</br>
  対応を記述していない場合、メソッドの呼び出し元に対応を任せる。</br>
  </br>

***

### 10-2_簡単な例外処理をしてみよう
例外が発生するプログラムを作って例外処理を行う。</br>
まず前回同様に架空の日付を出力しようとしてエラーを発生させる。</br>
```php
<?php
echo "start\n";
$date = new DateTime("199x-01-01");
echo $date->format('Y,m,d')."\n";
echo "end\n"
?>
```
↓出力結果
```
start
PHP Fatal error:  Uncaught Exception: DateTime::__construct(): Failed to parse time string (199x-01-01) at position 0 (1): Unexpected character in /Applications/MAMP/htdocs/project_php/curriculum_10/10-2.php:3
Stack trace:
#0 /Applications/MAMP/htdocs/project_php/curriculum_10/10-2.php(3): DateTime->__construct('199x-01-01')
#1 {main}
  thrown in /Applications/MAMP/htdocs/project_php/curriculum_10/10-2.php on line 3
```
</br>

次に例外処理を記述する。</br>
```php
<?php
echo "start\n";
try{  //try{例外を捕捉したい処理}
$date = new DateTime("199x-01-01");
echo $date->format('Y,m,d')."\n";
} catch (Exception $e) {          //try{処理}で例外が発生すると$e変数に"例外が発生したというオブジェクト"が代入される。
  echo $e->getMessage()."\n";     //$eのエラーメッセージを出力
}  //このcatchブロックを"例外ハンドラ"という。
echo "end\n";
?>
```
↓出力結果
```
start
DateTime::__construct(): Failed to parse time string (199x-01-01) at position 0 (1): Unexpected character
end
```
このようにエラーが発生した際はcatchブロックの内容が実行され最後まで処理が行われる。</br>
ここでは`try{例外を捕捉したい処理}`のようにtryブロックの中に例外を捕捉したい処理を記述。</br>
ここで例外が発生すると`$e変数`に"例外が発生した"というオブジェクト(**エクセプションオブジェクト**)が代入される。</br>
このcatchブロックを**例外ハンドラ**という。</br>
</br>

また例外処理では最後の`echo "end\n";`のように例外が発生してもしなくても実行したい処理を`finally{実行したい処理}`として下記のように記述する。
```php
<?php
echo "start\n";
try{
$date = new DateTime("199x-01-01");
echo $date->format('Y,m,d')."\n";
} catch (Exception $e) {
  echo $e->getMessage()."\n";
} finally {
echo "end\n";
}
?>
```
↓出力結果
```
start
DateTime::__construct(): Failed to parse time string (199x-01-01) at position 0 (1): Unexpected character
end
```
</br>

***

### 10-3_いろいろな書式で例外に対応しよう
エラーが発生した際のエラーメッセージを一般の人にでも理解できるようにする。
```php
<?php
echo "start\n";
try {
  $date = new DateTime("202x-01-01");
  echo $date->format('Y/m/d')."\n";
} catch (Exception $e) {
  // echo $e->getMessage()."\n";
  echo "指定された日付が不正です。\n";
  echo "発生した例外：".$e."\n";
} finally {
  echo "end\n";
}
?>
```
↓出力結果
```
start
指定された日付が不正です。
発生した例外：Exception: DateTime::__construct(): Failed to parse time string (202x-01-01) at position 0 (2): Unexpected character in /Applications/MAMP/htdocs/project_php/curriculum_10/10-3.php:4
Stack trace:
#0 /Applications/MAMP/htdocs/project_php/curriculum_10/10-3.php(4): DateTime->__construct('202x-01-01')
#1 {main}
end
```
</br>

次に出力タブに通常の出力(**標準出力:`STDOUT`**)、エラーメッセージをエラー出力(**標準エラー出力:`STDERR`**)に出力するようにする。
```php
<?php
echo "start\n";
try {
  $date = new DateTime("202x-01-01");
  echo $date->format('Y/m/d')."\n";
} catch (Exception $e) {
  echo "指定された日付が不正です。\n";
  fputs(STDERR,$e->getMessage()."\n"); //ここの文法注意。()とかカンマとか
} finally {
  echo "end\n";
}
?>
```
↓出力結果
```php
//標準出力

start
指定された日付が不正です。
end


//エラー出力

DateTime::__construct(): Failed to parse time string (202x-01-01) at position 0 (2): Unexpected character
```
</br>

***

### 10-4_throwで意図的に例外を投げよう
**`throw`**：例外処理を意図的に実行できる。また`catch`と組み合わせる事でメソッド呼び出し元の例外処理を利用できる。(この機能は今回は触れない)</br>
```php
<?php
echo "start\n";
try {
  throw new Exception("意図的な例外");     //ここでコンストラクターの引数にメッセージ指定している。
  echo "例外を投げた後\n";  //実行されていない
} catch (Exception $e) {
  echo "例外発生:",$e->getMessage()."\n";
} finally {
  echo "end\n";
}
?>
```
↓出力結果
```
start
例外発生:意図的な例外
end
```
ここでは`throw new Exception("意図的な例外");`と記述した事で例外が発生したことになり、その後の`echo "例外を投げた後\n";`は実行されていない。
</br>
</br>

***

### 10-5_発生させる例外を変えてみよう
Exceptionクラスのオブジェクト以外の例外</br>
- RangeException:多すぎる少なすぎるといった量や範囲などの例外
- LengthException:長過ぎる短すぎるといった長さなどの例外
</br>

前回作成した意図的な例外の記述をRangeExceptionに変えてみる。
```php
<?php
echo "start\n";
try {
  throw new RangeException("意図的な例外");
  echo "例外を投げた後\n";
} catch (RangeException $e) {
  echo "例外発生:",$e->getMessage()."\n";
} finally {
  echo "end\n";
}
?>
```
↓出力結果
```
start
例外発生:意図的な例外
end
//出力内容自体は変わらない
```
</br>

次にthrowの方の例外を`LengthException`に変えてみる。
```php
<?php
echo "start\n";
try {
  throw new LengthException("意図的な例外");
  echo "例外を投げた後\n";
} catch (RangeException $e) {
  echo "例外発生:",$e->getMessage()."\n";
} finally {
  echo "end\n";
}
?>
```
↓出力結果
```
start
end
PHP Fatal error:  Uncaught LengthException: 意図的な例外 in /Applications/MAMP/htdocs/project_php/curriculum_10/10-5.php:4
Stack trace:
#0 {main}
  thrown in /Applications/MAMP/htdocs/project_php/curriculum_10/10-5.php on line 4
```
となり、throwとcatchの例外の種類が違うためエラーが発生する。</br>
</br>

ちなみに`throw`が**例外クラスのオブジェクト以外は投げる事ができない。**</br>
たとえばthrowとcatchの`Exception`を`DateTime`に変えたりしてもエラーが発生する。</br>
</br>

***

### 10-6_複数の例外を捕捉してみよう
前回までは処理に対して一つの例外しか発生しない体で記述を行ってきた。</br>
今回は複数の例外が発生する条件で記述を行う。</br>
```php
<?php
echo "start\n";
try {
  $pattern = 0;
  if($pattern == 0){
    throw new RangeException("意図的な範囲例外");  
  } else if($pattern == 1) {
    throw new LengthException("意図的な長さ例外");
  } else {
    throw new Exception("意図的なその他例外");
  }
    echo "例外を投げた後\n";
} catch (RangeException $e) {
  echo "例外発生1:", $e->getMessage() . "\n";
} catch (LengthException $e) {
  echo "例外発生2:", $e->getMessage() . "\n";
} catch (Exception $e) {
  echo "例外発生3:", $e->getMessage() . "\n";
} finally {
  echo "end\n";
}
?>
```
↓出力結果
```php
start
例外発生1:意図的な範囲例外
end

// $pattern = 0を1またはその他に変更すれば出力されるエラーメッセージが変わる。
```
</br>

次にthrowの`Exception`を`InvalidArgumentException(引数が期待する形式と一致しなかったことを示す例外)`に変更してみる。
```php
<?php
echo "start\n";
try {
  $pattern = 3;
  if($pattern == 0){
    throw new RangeException("意図的な範囲例外");  
  } else if($pattern == 1) {
    throw new LengthException("意図的な長さ例外");
  } else {
    throw new InvalidArgumentException("意図的なその他例外");   //変更箇所
  }
    echo "例外を投げた後\n";
} catch (RangeException $e) {
  echo "例外発生1:", $e->getMessage() . "\n";
} catch (LengthException $e) {
  echo "例外発生2:", $e->getMessage() . "\n";
} catch (Exception $e) {
  echo "例外発生3:", $e->getMessage() . "\n";
} finally {
  echo "end\n";
}
?>
```
↓出力結果
```
start
例外発生3:意図的なその他例外
end
```
というようにExceptionオブジェクトで捕捉できる。</br>
これは**Exceptionクラスが全ての例外クラスのスーパークラス(親クラス)である**からである。

***

### 10-7_例外処理の呼び出し元に任せよう
例外が発生した事を関数の呼び出し元に知らせ、その対応を任せる。
```php
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
  $dateTime = test_exception('1991-01-01');
  echo "7\n";
} catch (Exception $e){
  echo "8\n";
}
echo "9\n";
?>
```
↓出力結果
```
1
2
3
7
9
```
上記はfunction内の`return new DateTime($date);`が正常に処理されていることから、その後の"4"と例外処理のcatchブロックの"5",その後の"6"、また関数の呼び出し先のcatchブロック内の"8"は実行されていない。</br>
</br>

次に例外が発生するパターン。
```php
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
```
↓出力結果
```
1
2
3
5
8
9
```
ここでは呼び出し元でも呼び出し先でもcatchブロック内の内容が実行されている。</br>
</br>

また、`echo "6\n";`が正常な場合でも例外の場合でも実行されていないのは、呼び出し元において、関数で例外が発生したりthrowでエラーを投げられたりするとその後の処理が行われないからである。</br>
例外が発生しても発生しなくても処理を実行したい場合は以前学習した`finally{}`を用いる。</br>
</br>

***

### 10-8_finallyをもっと理解しよう
例外が発生しても発生しなくても処理を実行する記述。
```php
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
  } finally {  //例外の有無に関わらず実行したい処理をfinallyブロックにいれる。
  echo "6\n";
  }
}

echo "1\n";

try {
  $dateTime = test_exception('1999-01-01');
  echo "7\n";
} catch (Exception $e){
  echo "8\n";
}
?>
```
↓出力結果
```
// 正常時
1
2
3
6
7

//例外発生時
1
2
3
5
6
8
```
↑のように例外の有無に関わらず`echo "6\n";`は実行される。
