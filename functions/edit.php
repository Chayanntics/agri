<?php
error_reporting(0);

ini_set('memory_limit', '-1');
ini_set('post_max_size', '900M');

include('../class/method.php');
error_reporting(0);

function encryptPassword($password, $key, $iv)
{
    // Encrypt the password using AES encryption with the fixed IV
    $encrypted = openssl_encrypt($password, 'aes-256-cbc', $key, 0, $iv);

    // Encode the encrypted password in Base64 format
    return base64_encode($encrypted);
}


try {

    $inputs = array_keys($_POST);

    $table_1 = "";
    $last_insert_id = 0;

    foreach ($_POST['table'] as $k => $table_name) {

        $data = [];
        $pk_name = $table_name . "-" . $table_name . "_id";
        $fk_name = $table_name . "-" . $table_1 . "_id";

        $record = [];

        for ($i = 0; $i < count($_POST[$pk_name]); $i++) {

            // $_POST[$fk_name][$i] = $last_insert_id;
            $kawat = "";

            foreach ($inputs as $in) {

                $input_name = $in;

                // read count of input
                if (strpos($input_name, $table_name . "-") !== false) { //search if table exist in input

                    $value = $_POST[$in][$i];
                    $field = str_replace($table_name . "-", "", $in);

                    $value = ($field == 'password') ? encryptPassword($value, 'build', 1) : $value;

                    $data[$field] = $value;
                }
            }

            $primary_id = $data[$table_name . "_id"];

            unset($data[$table_name . "_id"]);

            $method->id = $primary_id;
            $method->id_name = $table_name . "_id";
            $method->inputs = $data; // all input fields

            $res = $method->updateTable($table_name);
        }

        $table_1 = $table_name;
        $last_insert_id = $k + 1;
        $i++;
    }

    $ref = $_SERVER["HTTP_REFERER"];

    // echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
    echo "<script>window.location='$ref'</script>";
} catch (Exception $e) {
    echo $e;
}
