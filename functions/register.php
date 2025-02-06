<?php
error_reporting(0);
ini_set('memory_limit', '-1');
ini_set('post_max_size', '900M');

include('../class/method.php');
session_start();

error_reporting(0);

extract($_POST);

$sql = "INSERT INTO tbl_account (username, password, account_type) VALUES ('$username','$password', '$type')";
$m->sql = $sql;
$account_id = $m->queryRaw();

$_SESSION['agri_type'] = $type;
$_SESSION['agri_id'] = $account_id;

if ($type == 'customer') {

	$sql = "INSERT INTO tbl_customer (customer_name, tbl_account_id) VALUES ('$name', '$account_id')";
	$m->sql = $sql;
	$m->queryRaw();

	echo "<script>window.location='../dashboard3.php'</script>";
} else {

	$sql = "INSERT INTO tbl_driver (driver_name, tbl_account_id) VALUES ('$name', '$account_id')";
	$m->sql = $sql;
	$m->queryRaw();

	echo "<script>window.location='../dashboard4.php'</script>";
}
