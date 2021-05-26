<?php
class Item {
  public $price;
  Public $quantity; //「量・数量」の意味

  public function __construct($newPrice, $newQuantity){
    $this ->price = $newPrice;
    $this ->quantity = $newQuantity;
  }

  public function getTotalPrice(){
    return $this->price * $this ->quantity;
  }
}

$apple = new Item(150,10);
echo "合計金額は".$apple -> getTotalPrice()."円です。\n";

$orange = new Item(85,32);
echo "合計金額は" . $orange->getTotalPrice() . "円です。\n";

//メソッドの戻り値を変数に代入する事も可能。
$totalApple = $apple->getTotalPrice();
echo "合計金額は" . $totalApple . "円です。\n";
?>