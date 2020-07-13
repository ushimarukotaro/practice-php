<?php
require_once(__DIR__ . '/header.php');
?>

<body>

<?php

try {
  $staff_code = $_GET['staffcode'];

  $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT name FROM mst_staff WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $staff_code;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $staff_name = $rec['name'];

  $dbh = null;

} catch(Exception $e) {
  echo 'ただいま通信障害によりご迷惑お掛けしております';
  exit();
}

?>

<h1 class="page_title">スタッフ削除</h1></br>
<h2 class="error_p">スタッフコード</h2></br>
<p><?= $staff_code; ?></p></br>
<p>スタッフ名</p>
<p><?= $staff_name ?></p>
<p>このスタッフを削除してよろしいですか？</p>
<form method="post" action="staff_delete_done.php">
  <input type="hidden" name="code" value="<?= $staff_code; ?>">
  <input type="button" class="btn" onclick="history.back()" value="BACK">
  <input type="submit" class="btn" value="OK">
</form>
</body>