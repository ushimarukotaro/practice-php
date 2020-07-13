<?php
require_once(__DIR__ . '/header.php');
?>

<body>
  <?php

  try {
    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT code,name,price FROM mst_product WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;
  ?>
    <h1 class="staff">商品一覧</h1>
    <form method="post" action="pro_brunch.php">
    <div class="staff_list">
      <?php while (true) {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rec == false) {
          break;
        } ?>
          <input type="radio" id="<?= $rec['procode'] ?>" class="radio-inline__input" name="procode" value="<?= $rec['code'] ?>">
          <!-- <label class="radio-inline__label" for=""></label></br> -->
          <?= $rec['name'] . '  ---  ' . $rec['price'] . '円'; ?></br>
      <?php } ?>
    </div>
      <input type="submit" class="btn" name="disp" value="参照">
      <input type="submit" class="btn" name="add" value="追加">
      <input type="submit" class="btn" name="edit" value="修正">
      <input type="submit" class="btn" name="delete" value="削除">
    </form>
  <?php } catch (Exception $e) {
    echo 'ただいま通信障害により大変ご迷惑をお掛けしています。';
    exit();
  } ?>

</body>