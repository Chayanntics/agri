<?php
include('../class/method.php');

$table_name = $_POST['table'];
$id_name = $_POST['field'];
$id_val = $_POST['id'];

$method->id = $id_val;
$method->id_name = $id_name;

$res = $method->deleteRecord($table_name);

if(empty($res)){
    $return = json_encode(['success' => 1, 'data' => $res]);
}else{
    $return = json_encode(['success' => 0, 'data' => 'error']);
}

echo $return;

