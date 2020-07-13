<?php
require_once(__DIR__ . '/header.php');
?>

<body>

<?php

try {
  $pro_code = $_GET['procode'];

  $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $pro_code;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $pro_name = $rec['name'];
  $pro_price = $rec['price'];
  $pro_gazou_name = $rec['gazou'];

  $dbh = null;

  // if ($pro_gazou_name == '') {
  //   $disp_gazou = '';
  // } else {
  //   $disp_gazou = '<img src="./gazou/'.$pro_gazou_name.'">';
  // }
  
  //　上記のif文と同じ意味
  $disp_gazou = ($pro_gazou_name == '') ? '' : '<img src="./gazou/'.$pro_gazou_name.'">';
  
} catch(Exception $e) {
  echo 'ただいま通信障害によりご迷惑お掛けしております';
  exit();
}

?>

<h1>商品情報参照</h1>
<h2>商品コード</h2>
<p><?= $pro_code; ?></p>
<h2>商品名</h2>
<p><?= $pro_name; ?></p>
<h2>価格</h2>
<p><?= $pro_price; ?>円</p>
<?= $disp_gazou ?>
<form>
  <input type="button" class="btn" onclick="history.back()" value="BACK">
</form>
</body>