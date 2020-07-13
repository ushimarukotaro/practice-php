<?php
require_once(__DIR__ .'/header.php');
?>

<body>
  <h2 class="page_title">スタッフ追加</h2>
  <form method="post" action="staff_add_check.php">
    <p class="form_p">スタッフ名を入力してください</p>
    <input type="text" name="name">
    <p class="form_p">パスワードを入力してください</p>
    <input type="password" name="pass">
    <p class="form_p">パスワードをもう1度入力してください</p>
    <input type="password" name="pass2"></br>
    <input type="button" class="btn"  onclick="history.back()" value="BACK">
    <input type="submit" class="btn" value="OK">
  </form>
</body>

</html>