<?php

require_once(__DIR__ . '/header.php');

//　データベースに接続
$dsn = 'mysql:dbname=Practice;host=localhost';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

//  アンケートの情報を取得
$sql = 'SELECT * FROM anketo WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();
?>
<table class="list">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Opinion</th>
  </tr>
</table>

<?php while (1) {
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($rec == false) {
    break;
  } ?>
  <table class="list">
    <tr>
      <td><?= $rec['code'] ?></td>
      <td><?= $rec['name'] ?></td>
      <td><?= $rec['email'] ?></td>
      <td><?= $rec['goiken'] ?></td>
    </tr>
  </table>
<?php } ?>

<?php
$dbh = null;
?>

<form>
  <a class="back_btn" href="./contact.php"><input class="back" type="button" value="BACK"></a>
</form>

<?php
//  footer
require_once(__DIR__ . '/footer.php');
