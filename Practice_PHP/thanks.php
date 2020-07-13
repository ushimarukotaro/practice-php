<?php

require_once(__DIR__ . '/header.php');
require_once(__DIR__ . '/global.php');

?>

<?php

try {
//  データベースに接続
$dsn = 'mysql:dbname=Practice;host=localhost';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

echo $name . '様';
echo '<p class="opinion">Thanks For Send Your Opinion!!</p>';
echo '<p class="opinion">ご意見ありがとうございました！！</p>';
echo '頂いたご意見『' . $goiken . '』は</br>';
echo "{$email}にメールを送信しましたので確認ください";

$mail_sub = 'アンケート受け付けました。';
$mail_body = $name . "様へ\nアンケートご協力ありがとうございました。";
$mail_body = html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
$mail_head = 'From:xxx@xxx.co.jp';
mb_language('Japanese');
mb_send_mail($email, $mail_sub, $mail_body, $mail_head);

//  自動保存
$sql = 'INSERT INTO anketo (name,email,goiken) VALUES ("' . $name . '","' . $email . '","' . $goiken . '")';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;
} catch(Exception $e) {
  echo 'ただいま障害により大変ご迷惑をお掛けしております';
}
?>


<form>
  <a class="back_btn" href="./contact.php"><input class="back" type="button" value="BACK"></a>
</form>



<?php
require_once(__DIR__ . '/footer.php');
