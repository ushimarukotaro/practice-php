<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $goiken = $_POST['goiken'];
  $code = $_POST['code'];

  $name = htmlspecialchars($name);
  $email = htmlspecialchars($email);
  $goiken = htmlspecialchars($goiken);
  $code = htmlspecialchars($code);
