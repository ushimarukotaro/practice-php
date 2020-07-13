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

  $sql = 'SELECT name FROM mst_product WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $pro_code;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $pro_name = $rec['name'];

  $dbh = null;

} catch(Exception $e) {
  echo 'ただいま通信障害によりご迷惑お掛けしております';
  exit();
}

?>

<h1 class="page_title">商品削除</h1></br>
<h2 class="error_p">商品コード</h2></br>
<p><?= $pro_code; ?></p></br>
<p>商品名</p>
<p><?= $pro_name ?></p>
<p>この商品を削除してよろしいですか？</p>
<form method="post" action="pro_delete_done.php">
  <input type="hidden" name="code" value="<?= $pro_code; ?>">
  <input type="button" class="btn" onclick="history.back()" value="BACK">
  <input type="submit" class="btn" value="OK">
</form>
</body>