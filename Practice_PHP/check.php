<?php

require_once(__DIR__ . '/header.php');
require_once(__DIR__ . '/global.php');

?>
<?php

if ($name === '') {
  echo '名前が入力されていません！！</br></br>';
} else {
  echo "ようこそ{$name}様！！<br></br>";
}

if ($gender) {
  echo '性別　：　' . $gender . '</br></br>';
}

if ($email === '') {
  echo 'メールアドレスが入力されていません！！</br></br>';
} else {
  echo "メールアドレス：{$email}</br></br>";
}

if ($goiken === '') {
  echo 'ご意見が入力されていません！！</br></br>';
} else {
  echo "ご意見：『{$goiken}』</br></br>";
}

?>

<?php if ($name == '' || $name == '' || $goiken == '') { ?>
  <form method="post" action="thanks.php">
    <input class="back" type="button" onclick="history.back()" value="BACK">
  </form>
<?php } else { ?>
  <form method="post" action="thanks.php">
    <input name="name" type="hidden" value="<?= $name ?>">
    <input name="email" type="hidden" value="<?= $email ?>">
    <input name="goiken" type="hidden" value="<?= $goiken ?>">
    <input name="gender" type="hidden" value="<?= $gender ?>">
    <input class="back" type="button" onclick="history.back()" value="BACK">
    <input class="ok_btn" type="submit" value="SEND">
  </form>
<?php } ?>


<?php
require_once(__DIR__ . '/footer.php');
