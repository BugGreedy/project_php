<?php
class Item {
  public static $tax = 1.08;
  // public $price;
  // Public $quantity; 

  // public function __construct($newPrice, $newQuantity){
  //   $this ->price = $newPrice;
  //   $this ->quantity = $newQuantity;
  // }

  public static function getTotalAmount($price,$quantity){
    return round($price * $quantity * self::$tax);
  }
}

$total = Item::getTotalAmount(150,10);
echo "合計金額は".$total."円です。\n";

?>
