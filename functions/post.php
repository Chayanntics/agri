<?php
error_reporting(0);
ini_set('memory_limit', '-1');
ini_set('post_max_size', '900M');

include('../class/method.php');
session_start();

// echo "<pre>";
// var_dump($_POST);
// die;
error_reporting(0);

try {

	$inputs = array_keys($_POST);
	$valid = true;

	$table_1 = "";
	$last_insert_id = 0;

	foreach ($_POST['table'] as $k => $table_name) {

		$data = [];
		$pk_name = $table_name . "-" . $table_name . "_id";
		$fk_name = $table_name . "-" . $table_1 . "_id";

		$record = [];

		if ($_POST[$pk_name]) {


			for ($i = 0; $i < count($_POST[$pk_name]); $i++) {

				$_POST[$fk_name][$i] = $last_insert_id;

				foreach ($inputs as $in) {

					$input_name = $in;

					// read count of input
					if (strpos($input_name, $table_name . "-") !== false) { //search if table exist in input

						$value = $_POST[$in][$i];
						$field = str_replace($table_name . "-", "", $in);

						$data[$field] = $value;
					}
				}

				if (isset($_POST['not_empty'])) {

					$item = $_POST['not_empty'];

					if ($data[$item] == null) {
						$data = [];
					}
				}

				// var_dump($data);
				// echo "<hr>";

				if ($data) {

					$keys = array_keys($data);
					$primary = $table_name . "_id";

					$fetch = "SELECT $primary FROM $table_name WHERE ";
					$where = [];

					foreach ($keys as $ks) {

						if ($ks != $table_name . "_id") {
							$where[] = $ks . " = '" . $data[$ks] . "'";
						}
					}

					$fetch .= implode(" AND ", $where);

					$method->sql = $fetch;
					$r = $method->selectRaw();

					if (empty($r)) {

						// var_dump($data);

						$method->inputs = $data; // all input fields
						$last_insert_id = $method->saveToDB($table_name);
					} else {
						$valid = false;
					}
				}
			}
		}

		$table_1 = $table_name;
		$i++;
	}

	// die;
	$ref = $_SERVER["HTTP_REFERER"];

	if (!$valid) {
		// echo "<script type='text/javascript'>alert('Entry is already added!')</script>";
	}
	// var_dump($ref);
	echo "<script>window.location='$ref'</script>";
} catch (Exception $e) {
	echo $e;
}
