<?php
include "layout/header.php";

$sql = "SELECT * FROM tbl_customer WHERE tbl_account_id = '$_SESSION[agri_id]'";
$m->sql = $sql;
$res = $m->selectRaw();
$customer_id = $res[0]['tbl_customer_id'];
?>

<div class='container-fluid'>
    <div class='row mt-3'>
        <div class="col-lg-4 col-sm-12 mb-3">

            <div class="card">
                <div class="card-header">
                    <div>
                        <h4 class="card-title">address Form</h4>
                        <!-- <p class="m-0 subtitle">Lorem Ipsum</p> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="basic-form ps-3 pe-3 pb-3">

                        <form method="post" action="functions/post.php" class="form-valide-with-icon needs-validation" novalidate id="frm-row" enctype="multipart/form-data">

                            <!-- form processing loader -->
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <!-- form processing loader -->


                            <input type='hidden' id='form-table' name='table[]' class='none' value='tbl_address'>

                            <div id="form-div-address">
                                <div class="form-source">

                                    <input type='hidden' id='address-tbl_address_id' name='tbl_address-tbl_address_id[]' class='editable none' value=''>
                                    <input type='hidden' id='address-tbl_customer_id' name='tbl_address-tbl_customer_id[]' class='none' value='<?= $customer_id ?>'>
                                    <div class='row'>

                                        <div class='col-md-12 form-group '>
                                            <div class='row mb-2'>

                                                <label for='address-address' class="text-label form-label">address:</label>

                                                <div class=''>
                                                    <input type='text' name='tbl_address-address[]' id='address-address' class='form-control editable ' value='' required>
                                                    <div class="invalid-feedback">
                                                        Please Enter a address.
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row multi-form" hidden>
                                <div class="col-md-12 text-end">
                                    <button type='button' class='btn btn-outline-info btn-sm' onclick="addNewForm('#form-div-address')">Add New (+)</button>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-12 text-end add-btns'>
                                    <hr style="margin-bottom: 30px">
                                    <button type='reset' class='btn btn-outline-danger me-2'>Reset</button>
                                    <button type='submit' class='btn btn-outline-primary'>Save Changes</button>
                                </div>
                                <div class='col-12 text-end edit-btns' hidden>
                                    <hr>
                                    <button type='reset' class='btn btn-outline-danger me-2' onclick="cancelEdit()">Cancel</button>
                                    <button type='submit' class='btn btn-outline-success'>Update</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-8 mb-3">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card dz-card">
                        <div class="card-header flex-wrap">
                            <div>
                                <h4 class="card-title">address List</h4>
                                <!-- <p class="m-0 subtitle">Lorem Ipsum</p> -->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active p-4">

                                <?php
                                $sql = "SELECT * FROM tbl_address LEFT JOIN tbl_customer ON tbl_customer.tbl_customer_id=tbl_address.tbl_customer_id";
                                $m->sql = $sql;
                                $record = $m->selectRaw();
                                ?>

                                <div class="table-responsive">
                                    <table id="datatable-address" class="dt-table display table" style="width: calc(100% - 2px)">
                                        <thead>
                                            <tr class='text-center'>
                                                <td class='text-center'>
                                                    <label class='mb-0'>ID</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Customer</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Address</label>
                                                </td>
                                                <td class=" text-center">
                                                    <label class='mb-0'>Action</label>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            foreach ($record as $k => $r) {
                                                extract($r);

                                            ?>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_address-tbl_address_id" hidden><?= $tbl_address_id; ?></span>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_address-tbl_customer_id" hidden><?= $tbl_customer_id; ?></span>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_address-address" hidden><?= $address; ?></span>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $tbl_address_id; ?></td>
                                                    <td class="text-center">
                                                        <?= $customer_name; ?></td>
                                                    <td class="text-center">
                                                        <?= $address; ?></td>
                                                    <td class="text-center ">
                                                        <button type="button" class="btn btn-outline-info btn-action me-2" onclick="editInfo(<?= $k ?>)"><i class="bi bi-pen"></i></button>
                                                        <button type="button" class="btn btn-outline-danger btn-action me-2" onclick="deleteInfo('tbl_address','tbl_address_id',<?= $tbl_address_id;  ?>)"><i class="bi bi-trash"></i></button>
                                                    </td>
                                                </tr>

                                            <?php

                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php
include "layout/footer.php";
?>

<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')

                }, false)
            })
    })()
</script>