<?php
require_once(__DIR__ . '/header.php');
?>

<body>
  <?php
  try {
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];
    //  入力データに安全対策
    $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
    $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
    //  データベースに接続
    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //レコードを追加
    $sql = 'INSERT INTO mst_staff(name,password) VALUES (?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass;
    $stmt->execute($data);

    $dbh = null; // データベースから切断
  ?>
    <p class="error_p"><?= $staff_name . 'さんを追加しました' ?></p>
  <?php } catch (Exception $e) { ?>
    <p class="error_p">ただいま通信障害によりご迷惑お掛けします</p>
  <?php exit();
  } ?>


  <a href="staff_list.php" class="btn back">戻る</a>
</body>