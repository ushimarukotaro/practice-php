<?php
require_once(__DIR__ . '/header.php');
?>

<body>
  <?php
  try {

    $staff_code = $_POST['code'];

    //  データベースに接続
    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //レコードを追加
    $sql = 'DELETE FROM mst_staff WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_code;
    $stmt->execute($data);

    $dbh = null; // データベースから切断
  ?>
  <?php } catch (Exception $e) { ?>
    <p class="error_p">ただいま通信障害によりご迷惑お掛けします</p>
  <?php exit();
  } ?>
  <p>削除しました</p></br>

  <a href="staff_list.php" class="btn back">戻る</a>
</body>