<?php
error_reporting(0);

class method
{

    function __construct()
    {

        global $dbname;

        // Create connection$servername = "localhost";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "db_agrikulture";

        try {
            $conn = new PDO(
                "mysql:host=$servername;dbname=$database",
                $username,
                $password
            );
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";

            $this->conn = $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die;
        }
    }

    function rawFetch($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function saveToDB($tbl_name)
    {

        $data = $this->inputs;
        $formatted_names = $this->inputNamings_insert($data);
        $formatted_values = $this->inputValues_insert($data);

        $result = $this->insertIntoTable($tbl_name, $formatted_names, $formatted_values);

        return $result;
    }

    function inputNamings_insert($data)
    {

        $inputname = array_keys($data);
        $names = "";

        foreach ($inputname as $d) {

            $names .= "`" . $d . "`, ";
        }

        $names = substr($names, 0, -2);
        return $names;
    }

    function inputValues_insert($data)
    {

        $inputvalues = ($data);
        $values = "";

        foreach ($inputvalues as $d) {

            $values .= "'" . $d . "', ";
        }

        $values = substr($values, 0, -2);
        return $values;
    }

    function insertIntoTable($tbl_name, $names, $values)
    {

        $sql = "INSERT IGNORE INTO `$tbl_name` ($names) VALUES ($values) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if (!$stmt) {
            $return = $this->conn->errorInfo();
        } else {
            $return = $this->conn->lastInsertId();
        }

        return $return;
    }


    function inputNamings_update($data)
    {

        $update_name = array_keys($data);
        $update_values = $data;

        $update = "";

        foreach ($update_name as $a) {
            $update .= $a . "='" . $update_values[$a] . "', ";
        }

        $update_final = substr($update, 0, -2);

        return $update_final;
    }


    function updateTable($tbl_name)
    {

        $id = $this->id;
        $id_name = $this->id_name;
        $data = $this->inputs;

        $update_final = $this->inputNamings_update($data);

        $sql = "UPDATE IGNORE `$tbl_name` SET $update_final WHERE `$id_name` = '$id' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if (!$stmt) {
            $return = $this->conn->errorInfo();
        } else {
            $return = null;
        }

        return $return;
    }

    function deleteRecord($tbl_name){
        $id = $this->id;
        $id_name = $this->id_name;

        $sql = "DELETE FROM `$tbl_name` WHERE `$id_name` = '$id' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if (!$stmt) {
            $return = $this->conn->errorInfo();
        } else {
            $return = null;
        }
    }

    function inputNamings_select($data)
    {

        $select_name = array_keys($data);
        $select_values = $data;

        $select = "";

        foreach ($select_name as $a) {
            $select .= $a . "='" . $select_values[$a] . "' AND ";
        }

        $select_final = substr($select, 0, -5);

        return $select_final;
    }
    //End matic//


    function queryRaw()
    {

        try {

            $sql = $this->sql;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $id = $this->conn->lastInsertId();
        }
          
        //catch exception
        catch(Exception $e) {

            $sql = $this->sql;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $id = "";
        }

        return $id;
        
    }

    function selectAll()
    {
        $table_name = $this->table_name;
        $id_name = (!empty($this->id_name)) ? $this->id_name : null;
        $id_val = (!empty($this->id_val)) ? $this->id_val : null;

        $order = (!empty($this->order)) ? $this->order : null;

        $sql = "SELECT * FROM  `$table_name` WHERE 1=1 ";
        if (!empty($id_val)) $sql .= " AND `$id_name` = '$id_val' ";

        if (!empty($order)) $sql .= " ORDER BY $order ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function selectFields()
    {

        $table_name = $this->table_name;
        $field = $this->field_name;

        $id_name = (!empty($this->id_name)) ? $this->id_name : null;
        $id_val = (!empty($this->id_val)) ? $this->id_val : null;

        $sql = "SELECT $field FROM  `$table_name` WHERE 1=1 ";
        if (!empty($id_val)) $sql .= " AND `$id_name` = '$id_val'";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function selectRaw()
    {

        $sql = $this->sql;

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getFieldValue($val, $field_name, $table)
    {

        $field_id = $table . "_id";

        $sql = "SELECT $field_name FROM  `$table` WHERE 1=1 AND `$field_id` = '$val'";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC)[$field_name];
        }
    }

    function selectAllDebug()
    {

        $table_name = $this->table_name;
        $id_name = (!empty($this->id_name)) ? $this->id_name : null;
        $id_val = (!empty($this->id_val)) ? $this->id_val : null;

        $sql = "SELECT * FROM  `$table_name` WHERE 1=1 ";
        if (!empty($id_val)) $sql .= " AND `$id_name` = '$id_val'";

        return $sql;
    }

    function getColNames()
    {
        $table_name = $this->table_name_col;
        $stmt = $this->conn->prepare("SHOW FULL COLUMNS FROM `$table_name`");
        $stmt->execute();

        $tb_structure = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $tb_structure_selected = [];

        foreach ($tb_structure as $info) {

            extract($info);

            $fileType = $this->file_type($Comment);
            $cleanComment = $this->clean_label($Comment);

            $tb_structure_selected[] = ['Field' => $Field, 'Comment' => $cleanComment, 'raw_Comment' => $Comment, 'file_type' => $fileType];
        }


        return ['all' => $tb_structure, 'selected' => $tb_structure_selected];
    }

    function toStringList($array)
    {

        $val = "";

        foreach ($array as $ar) {

            foreach (array_keys($ar) as $r) {

                if (!(strpos(strtolower($r), "color") === false)) {
                    $val .= '<div class="icon-color margin-auto" style="background: ' . $ar[$r] . '"></div>';
                } else {
                    $val .= '<div>' . $ar[$r] . '</div>';
                }
            }
        }

        return $val;
    }

    function toStringcheckBoxRadio($array)
    {

        $checkBoxRadio_name = $this->checkBoxRadio_name;
        $checkBoxRadio_prefix = $this->checkBoxRadio_prefix;
        $checkBoxRadio_display_label = $this->checkBoxRadio_display_label;

        $res = "";
        foreach ($array as $ar) {

            $val = "";
            $checkBoxRadio_id = "";

            foreach (array_keys($ar) as $r) {

                if ((!(strpos(strtolower($r), "color") === false)) && ((strpos(strtolower($r), "_id") === false))) {
                    $val .= ' <label for="' . $checkBoxRadio_prefix . $checkBoxRadio_name . 'replace_by_id"> <div class="icon-color inline-flex cursor" style="background: ' . $ar[$r] . '"></div> </label>';
                } else if (!(strpos(strtolower($r), "_id") === false)) {
                    $checkBoxRadio_id = $ar[$r];
                    $val .= ' <input type="radio" id="' . $checkBoxRadio_prefix . $checkBoxRadio_name . $ar[$r] . '" name="' . $checkBoxRadio_name . '" value="' . $ar[$r] . '"> ';
                } else {
                    if ($checkBoxRadio_display_label) $val .= " " . $ar[$r];
                }
            }

            $val = str_replace("replace_by_id", $checkBoxRadio_id, $val);

            $res .= $val;
            //$res .= "<div>" . $val . "</div>";
        }

        return $res;
    }

    function toStringDropDown($array, $dropdown_field_name, $table)
    {

        $res = "";
        $record_id = [];
        foreach ($array as $ar) {

            $val = "";

            foreach (array_keys($ar) as $r) {

                if (!in_array($ar[$r], $record_id)) {

                    $record_id[] = $ar[$r];
                    if (!(strpos(strtolower($r), "_id") === false)) {

                        $option_text = $this->getFieldValue($ar[$r], $dropdown_field_name, $table);

                        if (!empty($option_text)) {

                            if (isset($this->checkDropDown_name)) {
                                $checkDropDown_name = $this->checkDropDown_name;
                                $checkDropDown_prefix = $this->checkDropDown_prefix;

                                $id_for_edit_only = 'id = "' . $checkDropDown_prefix . $checkDropDown_name . $ar[$r] . '"';
                            } else {
                                $id_for_edit_only = "";
                            }

                            $val .= '<option value="' . $ar[$r] . '" ' . $id_for_edit_only . '> ' . $option_text . ' </option>';
                        }
                    }
                }
            }

            $res .= $val;
        }

        return $res;
    }

    function tableExistsCheck($check_sub_id)
    {

        $fk_table_name_id = $this->fk_table_name_id;
        $pk_table_name = $this->table_name_parent;


        if (((strpos($fk_table_name_id, "_id")) !== false) && $pk_table_name . "_id" != $fk_table_name_id) {
            $table_name = substr($fk_table_name_id, 0, -3);
        } else if ($check_sub_id !== false) {
            $table_name = substr($check_sub_id, 0, -3);
        } else {
            return false;
        }

        // Try a select statement against the table
        // Run it in try/catch in case PDO is in ERRMODE_EXCEPTION.
        try {
            $result = $this->conn->query("SELECT 1 FROM $table_name LIMIT 1");
        } catch (Exception $e) {
            // We got an exception == table not found
            return FALSE;
        }

        // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
        return $result !== FALSE;
    }

    function tableExists($check_sub_id)
    {

        $fk_table_name_id = $this->fk_table_name_id;
        $pk_table_name = $this->table_name_parent;


        if (((strpos($fk_table_name_id, "_id")) !== false) && $pk_table_name . "_id" != $fk_table_name_id) {
            $table_name = substr($fk_table_name_id, 0, -3);
        } else if ($check_sub_id !== false) {
            $table_name = substr($check_sub_id, 0, -3);
        } else {
            return false;
        }

        // Try a select statement against the table
        // Run it in try/catch in case PDO is in ERRMODE_EXCEPTION.
        try {
            $result = $this->conn->query("SELECT 1 FROM $table_name LIMIT 1");
        } catch (Exception $e) {
            // We got an exception == table not found
            return FALSE;
        }

        // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
        return $result !== FALSE;
    }



    function tableExistsDebug()
    {

        $fk_table_name_id = $this->fk_table_name_id;
        $pk_table_name = $this->table_name_parent;

        return ((strpos($fk_table_name_id, "_id") !== false) && ($pk_table_name . "_id" != $fk_table_name_id));
    }

    function listAnotherTable($fk_field)
    {

        $this->field_name = implode(",", $fk_field);

        $this->table_name = $this->another_table_name;
        $this->id_name = $this->another_id_name;
        $this->id_val = $this->another_id_val;

        return $this->selectFields();
    }

    function checkBoxRadioAnotherTable($fk_field)
    {

        $this->table_name = $this->another_table_name;

        return $this->selectAll();
    }

    function checkDropDownAnotherTable()
    {
        $this->table_name = $this->another_table_name;

        return $this->selectAll();
    }

    function convertFieldToTable($field)
    {
        return substr($field, 0, -3);
    }

    function file_type($col)
    {
        $result = ((strpos($col, "-file_type-")) === false) ? false : true;

        return $result;
    }

    function check_sub_id($field)
    {
        if (!((strpos($field, "_subid")) === false)) {
            return str_replace("_subid", "_id", $field);
        } else {
            return false;
        }
    }

    function img_display($img)
    {
        return "<img src='upload/" . $img . "' style='max-width: 100px; height: auto' />";
    }

    function serialized_data($serialized_data)
    {
        $serialized_data = json_encode($serialized_data, true);
        $serialized_data = preg_replace('/\s+/', '-myCustomSymbol-', $serialized_data);
        $serialized_data = urlencode($serialized_data);
        $serialized_data = base64_encode($serialized_data);

        return $serialized_data;
    }

    function clean_label($str)
    {
        $str = str_replace("-file_type-", "", $str);
        $str = str_replace("-dropdown-", "", $str);
        $str = str_replace("-password-", "", $str);
        $str = str_replace("-textarea-", "", $str);
        $str = str_replace("-number-", "", $str);
        $str = str_replace("-date-", "", $str);
        $str = str_replace("-timestamp-", "", $str);
        $str = str_replace("-prefix-", "", $str);
        $str = str_replace("-hidden-", "", $str);
        $str = str_replace("-hiddenInput-", "", $str);
        $str = str_replace("_", " ", $str);

        $str = ucwords($str);

        return $str;
    }

    function login()
    {

        $table_name         = $this->table_name;
        $data               = $this->inputs;

        $select_final = $this->inputNamings_select($data);
        
        $sql = "SELECT * FROM $table_name WHERE $select_final";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

$method = new method();
$m = new method();
