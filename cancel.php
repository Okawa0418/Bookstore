<?php
require_once('database1.php');
require_once('cart_db.php');

// 送信された値を変数へ代入
$id = $_POST['cart_id'];

$cart = new Cart;
$cart->cancelCart($id);

header('Location: confirm.php');
exit;
