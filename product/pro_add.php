<?php
require_once(__DIR__ .'/header.php');
?>

<body>
  <h2 class="page_title">商品追加</h2>
  <form method="post" action="pro_add_check.php" enctype="multipart/form-data">
    <p class="form_p">商品名を入力してください</p>
    <input type="text" name="name" style="width:200px;">
    <p class="form_p">価格を入力してください</p>
    <input type="text" name="price" style="width:80px">
    <p class="form_p">画像を選択してください</p>
    <input type="file" name="gazou" style="width:400px"></br></br>
    <input type="button" class="btn"  onclick="history.back()" value="BACK">
    <input type="submit" class="btn" value="OK">
  </form>
</body>

</html>