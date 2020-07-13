<?php
require_once(__DIR__ . '/header.php');
?>

<body>
  <?php
  try {

    $pro_code = $_POST['code'];
    $pro_name = $_POST['name'];
    $pro_price = $_POST['price'];
    //  入力データに安全対策
    $pro_code = htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');
    $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
    $pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');
    //  データベースに接続
    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //レコードを追加
    $sql = 'UPDATE mst_product SET name=?,price=? WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data = [$pro_name, $pro_price, $pro_code];

    $stmt->execute($data);

    $dbh = null; // データベースから切断
  ?>
    <p>修正しました</p></br>

  <?php } catch (Exception $e) { ?>
    <p class="error_p">ただいま通信障害によりご迷惑お掛けします</p>
  <?php exit();
  } ?>


  <a href="pro_list.php" class="btn back">戻る</a>
</body>