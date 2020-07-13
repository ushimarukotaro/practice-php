<?php
// クラス
class Food {
  public $name;
  public $price;

  public function much() {
    echo $this->name . "は". $this->price . "円です！<br>";
  }
}


class Food2 extends Food {
  public function tax() {
    echo "税込み" . $this->price * 1.10 . "円です！<br>";
  }
}

//インスタンス
$apple = new Food();
$apple2 = new Food2();
$apple->name = "りんご";
$apple->price = 100;
$apple2->price = 100;
$apple->much();
$apple2->tax();