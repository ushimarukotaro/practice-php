<?php

require_once(__DIR__ . '/header.php');
require_once(__DIR__ . '/food.php');
require_once(__DIR__ . '/fruit.php');

?>
<h1 id="h1" class="h1">HELLO!! WORLD!!</h1>
<h2 id="h2" class="h2">hello again!!</h2>
<p id="p"></p>
<p class="guitar">I am guitarist!!</p>
<?php
echo red\getName() . "<br>";
echo yellow\getName() . "<br><br/>";

$family_name = '牛丸';
$name = ["浩太郎", "美喜", "蒼斗", "翔太郎", "春香"];
$shuffle_name = $name[rand(0, 4)];
$family = [
  '父' => ['牛丸浩太郎', '1985/03/14',35],
  '母' => ['牛丸美喜', '1985/03/05',35],
  '長男' => ['牛丸蒼斗', '2018/07/21',1],
  '弟' => ['牛丸翔太郎', '????',31],
  '妹' => ['牛丸春香', '????',28],
  '祖父' => ['牛丸光裕', '0429',68],
  '祖母' => ['牛丸三保子', '0720', 40]
];


echo "私の名前は<strong>{$family_name}</strong>" . "<strong>{$shuffle_name}</strong>" . "です！!<br/><br/>";

foreach ($name as $value) {
  if ($shuffle_name === '浩太郎') {
    echo '続柄は父です！！<br/><br/>';
    break;
  } elseif ($shuffle_name === '美喜') {
    echo "続柄は母です！！<br/><br/>";
    break;
  } elseif ($shuffle_name === '蒼斗') {
    echo '続柄は息子です！！</br></br>';
    break;
  } else {
    echo "続柄は兄妹です！！<br/><br/>";
    break;
  }
}
?>

<table>
  <caption>牛丸家</caption>
  <tr>
    <th>続柄</th>
    <th>名前</th>
    <th>誕生日など</th>
    <th>年齢</th>
  </tr>
  <?php foreach ($family as $key => $value) { ?>
    <tr>
      <td><?= $key ?></td>
      <td><?= $value[0] ?></td>
      <td><?= $value[1] ?></td>
      <td><?= $value[2] ?></td>
    </tr>
  <?php } ?>
</table>

<?php
$shuffle1 = rand(1, 10);
$shuffle2 = rand(0, 5);

function division($val1, $val2) {
  try {
    if ($val2 === 0) {
      throw new Exception('0で割ることはできません');
    }
    return $val1 / $val2;
  } catch (Exception $e) {
    return $e->getMessage();
  }
}

echo "<span>問題</span> $shuffle1 ÷ $shuffle2 は??<br><br>";
echo "<span>答え</span> : " . division($shuffle1, $shuffle2) . "！";
?>
<?php
require_once(__DIR__ . '/footer.php');
