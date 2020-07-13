<?php

require_once(__DIR__ . '/header.php');

$code = $_POST['code'];

//　データベースに接続
$dsn = 'mysql:dbname=Practice;host=localhost';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

//  アンケートの情報を取得
$sql = "SELECT * FROM anketo WHERE goiken LIKE '%$code%'";
// $sql = 'SELECT * FROM anketo WHERE code = ?';
$stmt = $dbh->prepare($sql);
$date[] = $code;
$stmt->execute($date);

echo '=====検索結果=====</br></br></br>';

if ($code == '') {
  echo '検索ワードが入力されてません！';
} else { ?>
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
        <td><?= $rec['name'] . 'さん' ?></td>
        <td><?= $rec['email'] ?></td>
        <td><?= $rec['goiken'] ?></td>
      </tr>
    </table>
  <?php } ?>
<?php } ?>


<?php
$dbh = null;
?>

<form>
  <a class="back_btn" href="./search.php"><input class="back" type="button" value="BACK"></a>
</form>

<?php
require_once(__DIR__ . '/footer.php');
