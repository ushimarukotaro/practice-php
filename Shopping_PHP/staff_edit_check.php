<?php
require_once(__DIR__ . '/header.php');
?>

<body>
  <?php

  $staff_code = $_POST['code'];
  $staff_name = $_POST['name'];
  $staff_pass = $_POST['pass'];
  $staff_pass2 = $_POST['pass2'];

  $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
  $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
  $staff_pass2 = htmlspecialchars($staff_pass2, ENT_QUOTES, 'UTF-8');
  ?>
  <?php if ($staff_name == '') { ?>
    <p class="error_p">スタッフ名が入力されていません！</p>
  <?php } else { ?>
    <p class="error_p">スタッフ名：<?= $staff_name ?></p>
  <?php } ?>

  <?php if ($staff_pass === '') { ?>
    <p class="error_p">パスワードが入力されていません！</p>
  <?php } ?>
  <?php if ($staff_pass != $staff_pass2) { ?>
    <p class="error_p">パスワードが一致しません！</p>
  <?php } ?>

  <?php if ($staff_name == '' || $staff_pass == '' || $staff_pass2 != $staff_pass2) { ?>
    <form>
      <input type="button" class="btn" onclick="history.back()" value="BACK">
    </form>
  <?php } else {
    //パスワードを暗号化
    $staff_pass = md5($staff_pass); ?>
    <form method="post" action="staff_edit_done.php">
      <input type="hidden" name="code" value="<?= $staff_code; ?>">
      <input type="hidden" name="name" value="<?= $staff_name; ?>">
      <input type="hidden" name="pass" value="<?= $staff_pass; ?>">
      <input type="button" class="btn" onclick="history.back()" value="BACK">
      <input type="submit" class="btn" value="OK">
    </form>
  <?php } ?>
</body>