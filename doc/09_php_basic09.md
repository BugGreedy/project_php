## PHP入門編9:さらにクラスを理解しよう

### 目次
[9-1_さらにクラスについて学習しよう](#9-1_さらにクラスについて学習しよう)</br>
[9-2_クラスを継承する](#9-2_クラスを継承する)</br>
[9-3_メソッドのオーバーライド](#9-3_メソッドのオーバーライド)</br>

***

### 9-1_さらにクラスについて学習しよう
クラスについて復習
- 変数とメソッドがセット
- クラス(設計図)からオブジェクトを生成する。
- クラスを引き継いで、新しいクラスを定義できる。
  - これを**継承**という。
</br>

このレッスンの内容
- クラスを継承する。
- メソッドのオーバーライド
- 具体例：RPGのPlayerクラスを継承
- クラスからメソッドを呼び出す。
- クラス変数とクラスメソッド

</br>

***

### 9-2_クラスを継承する
クラス継承を学習するため、宝箱クラスからクラス継承して宝石箱クラスを作成する。</br>
この時の宝箱クラスのように継承元になるクラス**親クラス/スーパークラス**、宝石箱のような継承先になるクラスを**小クラス/サブクラス**という。</br>
継承の記述は`class 小クラス名 extends 親クラス名{}`
```php
<?php
class Box {
  public $myItem;

  public function __construct(){
    $this -> myItem = "新しいアイテム";
  }

  public function open(){
    echo "宝箱を開いた。". $this -> myItem. "を手に入れた。\n";
  }
}

class JewelryBox extends Box{  //継承の記述は class 小クラス名 extends 親クラス名{}
  public function look(){
    echo "宝箱はキラキラと輝いている.\n";
  }
}

$chest = new Box();
$chest -> open();
echo "\n";
$jewelryChest = new JewelryBox();
$jewelryChest -> look();
$jewelryChest -> open();  //Boxクラスのメソッドやメンバ変数を引き継いで利用できる。
?>
```
↓出力結果
```
宝箱を開いた。新しいアイテムを手に入れた。

宝箱はキラキラと輝いている.
宝箱を開いた。新しいアイテムを手に入れた。
```

***

### 9-3_メソッドのオーバーライド 
**メソッドのオーバーライド**とは、親クラスで定義したメソッドを子クラスで再定義する事。</br>
```php
<?php
class Box {
  public $myItem;

  public function __construct($item){
    $this -> myItem = $item;
  }

  public function open(){
    echo "宝箱を開いた。". $this -> myItem. "を手に入れた。\n";
  }
}

class MagicBox extends Box{
  public function look(){
  echo "宝箱は妖しく輝いている.\n";
  }

  public function open(){  //親クラスで定義したメソッドと同名のメソッドを編集することで再定義できる。
    echo "宝箱を開いた。". $this -> myItem."が襲ってきた!\n";
  }
}


$chest = new Box("太刀");
$chest -> open();
echo "\n";
$magicBox = new MagicBox("貪欲者");
$magicBox -> look();
$magicBox -> open();
?>
```
↓出力結果
```
宝箱を開いた。太刀を手に入れた。

宝箱は妖しく輝いている.
宝箱を開いた。貪欲者が襲ってきた!
```

