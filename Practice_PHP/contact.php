<?php

require_once(__DIR__ . '/header.php');

?>

<form method="post" action="check.php" class="form">
  <p>名前を入力してください</p>
  <input name="name" type="text" placeholder="名前" value=""></br>
  <p>性別を選択してください</p>
  <input id="item-1" class="radio-inline__input" type="radio" name="gender" value="男" checked/>
  <label class="radio-inline__label" for="item-1">男</label>
  <input id="item-2" class="radio-inline__input" type="radio" name="gender" value="女"/>
  <label class="radio-inline__label" for="item-2">女</label>
  <p>メールアドレスを入力してください</p>
  <input name="email" type="text" placeholder="メールアドレス" value=""></br>
  <p>ご意見をお聞かせください</p>
  <textarea name="goiken" placeholder="ご意見をどうぞ" type="text"></textarea></br>
  <input type="submit" value="SEND">
</form>

<?php
require_once(__DIR__ . '/footer.php');
