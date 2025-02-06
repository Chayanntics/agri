<?php
include "layout/header.php";
?>

<div class='container-fluid'>
    <div class='row mt-3'>
        <div class="col-lg-4 col-sm-12 mb-3">

            <div class="">


                <div class="">


                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h4 class="card-title">account Form</h4>
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


                                    <input type='hidden' id='form-table' name='table[]' class='none' value='tbl_account'>

                                    <div id="form-div-account">
                                        <div class="form-source">

                                            <input type='hidden' id='account-tbl_account_id' name='tbl_account-tbl_account_id[]' class='editable none' value=''>
                                            <div class='row'>

                                                <div class='col-md-12 form-group '>
                                                    <div class='row mb-2'>

                                                        <label for='account-username' class="text-label form-label">username:</label>

                                                        <div class=''>
                                                            <input type='text' name='tbl_account-username[]' id='account-username' class='form-control editable ' value='' required>
                                                            <div class="invalid-feedback">
                                                                Please Enter a username.
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class='col-md-12 form-group '>
                                                    <div class='row mb-2'>

                                                        <label for='account-password' class="text-label form-label">password:</label>

                                                        <div class=''>
                                                            <input type='text' name='tbl_account-password[]' id='account-password' class='form-control editable ' value='' required>
                                                            <div class="invalid-feedback">
                                                                Please Enter a password.
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class='col-md-12 form-group '>
                                                    <div class='row mb-2'>

                                                        <label for='account-account_type' class="text-label form-label">type:</label>

                                                        <div class=''>
                                                            <input type='text' name='tbl_account-account_type[]' id='account-account_type' class='form-control editable ' value='' required>
                                                            <div class="invalid-feedback">
                                                                Please Enter a type.
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

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
                </div>


            </div>

        </div>


        <div class="col-lg-8 mb-3">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card dz-card">
                        <div class="card-header flex-wrap">
                            <div>
                                <h4 class="card-title">account List</h4>
                                <!-- <p class="m-0 subtitle">Lorem Ipsum</p> -->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active p-4">

                                <?php
                                $sql = "SELECT * FROM tbl_account ";
                                $m->sql = $sql;
                                $record = $m->selectRaw();
                                ?>

                                <div class="table-responsive">
                                    <table id="datatable-account" class="dt-table display table" style="width: calc(100% - 2px)">
                                        <thead>
                                            <tr class='text-center'>
                                                <td class='text-center'>
                                                    <label class='mb-0'>ID</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Username</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Password</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Type</label>
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

                                                <span class="row-td" id="td-<?= $k ?>-tbl_account-tbl_account_id" hidden><?= $tbl_account_id; ?></span>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_account-username" hidden><?= $username; ?></span>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_account-password" hidden><?= $password; ?></span>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_account-account_type" hidden><?= $account_type; ?></span>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $tbl_account_id; ?></td>
                                                    <td class="text-center">
                                                        <?= $username; ?></td>
                                                    <td class="text-center">
                                                        <?= $password; ?></td>
                                                    <td class="text-center">
                                                        <?= $account_type; ?></td>
                                                    <td class="text-center ">
                                                        <button type="button" class="btn btn-outline-info btn-action me-2" onclick="editInfo(<?= $k ?>)"><i class="bi bi-pen"></i></button>
                                                        <button type="button" class="btn btn-outline-danger btn-action me-2" onclick="deleteInfo('tbl_account','tbl_account_id',<?= $tbl_account_id;  ?>)"><i class="bi bi-trash"></i></button>
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