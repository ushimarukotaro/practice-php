<?php
require_once(__DIR__ . '/header.php');
?>

<body>
  <?php

  $pro_name = $_POST['name'];
  $pro_price = $_POST['price'];
  $pro_gazou =  $_FILES['gazou'];

  $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
  $pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');
  ?>
  <?php if ($pro_name == '') { ?>
    <p class="error_p">商品名が入力されていません！</p>
  <?php } else { ?>
    <p class="error_p">商品名：<?= $pro_name ?></p>
  <?php } ?>

  <?php if (preg_match('/^[0-9]+$/',$pro_price) == false) { ?>
    <p class="error_p">価格を正確に入力してください！</p>
  <?php } else { ?>
    <p>価格：<?= $pro_price ?>円</p>
  <?php } ?>



  <?php if ($pro_gazou['size'] > 0) { 
    if ($pro_gazou['size'] > 1000000) { 
      echo '画像が大きすぎます';
    } else { 
      move_uploaded_file($pro_gazou['tmp_name'],'./gazou'.$pro_gazou['name']); ?>
      <img src="./gazou/<?= $pro_gazou['name']; ?>"></br>
    <?php } 
  } ?>

<?php if ($pro_name == '' || preg_match('/^[0-9]+$/',$pro_price) == false || $pro_gazou['size'] > 1000000) { ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る">
    </form>
  <?php } else { ?>
    <p>上記の商品を追加します</p>
    <form method="post" action="pro_add_done.php">
      <input type="hidden" name="name" value="<?= $pro_name ?>">
      <input type="hidden" name="price" value="<?= $pro_price ?>">
      <input type="hidden" name="gazou_name" value="<?= $pro_gazou['name']; ?>">
      <input type="button" class="btn" onclick="history.back()" value="戻る">
      <input type="submit" class="btn" value="追加">
    </form>
  <?php } ?>
</body>