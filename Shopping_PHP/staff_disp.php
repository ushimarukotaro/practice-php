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

<h1>スタッフ情報参照</h1></br>
<h2>スタッフコード</h2></br>
<p><?= $staff_code; ?></p></br>
<h2>スタッフ名</h2>
<p><?= $staff_name; ?></p>
<form>
  <input type="button" class="btn" onclick="history.back()" value="BACK">
</form>
</body>