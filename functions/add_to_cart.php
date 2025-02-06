<?php
error_reporting(0);
ini_set('memory_limit', '-1');
ini_set('post_max_size', '900M');

include('../class/method.php');
session_start();

error_reporting(0);

extract($_POST);


$sql = "SELECT * FROM tbl_cart WHERE tbl_cart_id NOT IN (SELECT tbl_cart_id FROM tbl_order_cart) AND tbl_customer_id = '$tbl_customer_id' AND tbl_product_id = '$tbl_product_id'";
$m->sql = $sql;
$cart = $m->selectRaw();

if ($cart) {

	$sql = "UPDATE tbl_cart SET quantity_cart = (quantity_cart + $quantity_cart) WHERE tbl_cart_id = '$cart[0][tbl_cart_id]'";
	$m->sql = $sql;
	$m->queryRaw();
} else {
	$sql = "INSERT INTO tbl_cart (tbl_customer_id, tbl_product_id, quantity_cart) VALUES ('$tbl_customer_id', '$tbl_product_id', '$quantity_cart')";
	$m->sql = $sql;
	$s = $m->queryRaw();
}

$ref = $_SERVER["HTTP_REFERER"];

echo "<script>window.location='$ref'</script>";
