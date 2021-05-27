## PHP入門編10:例外処理を理解しよう

### 目次
[10-1_例外処理の概要を理解しよう](#10-1_例外処理の概要を理解しよう)</br>
[10-2_簡単な例外処理をしてみよう](#10-2_簡単な例外処理をしてみよう)</br>


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
  あらかじめコードを指定して、プログラム実行時に、処理の問題を検出。</br>
  </br>
- catch</br>
  問題を検出した際、どのように対応するか記述しておく。</br>
  </br>
- throws</br>
  対応を記述していない場合、メソッドの呼び出し元に対応を任せる。</br>
  </br>

***

### 10-2_簡単な例外処理をしてみよう