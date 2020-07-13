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

  $sql = 'SELECT name,price FROM mst_product WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $pro_code;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $pro_name = $rec['name'];
  $pro_price = $rec['price'];

  $dbh = null;

} catch(Exception $e) {
  echo 'ただいま通信障害によりご迷惑お掛けしております';
  exit();
}

?>

<h1 class="page_title">商品修正</h1>
<h2>商品コード</h2>
<p><?= $pro_code; ?></p>

<form method="post" action="pro_edit_check.php">
  <input type="hidden" name="code" value="<?= $pro_code; ?>">
  <p>商品名</p>
  <input type="text" name="name" value="<?= $pro_name; ?>">
  <p>価格</p>
  <input type="text" name="price" style="width:50px;" value="<?= $pro_price ?>">円</br>
  <input type="button" class="btn" onclick="history.back()" value="BACK">
  <input type="submit" class="btn" value="OK">
</form>
</body>