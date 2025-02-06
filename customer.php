<?php
include "layout/header.php";
?>

<div class='container-fluid'>
    <div class='row mt-3'>

        <div class="col-lg-12 mb-3">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card dz-card">
                        <div class="card-header flex-wrap">
                            <div>
                                <h4 class="card-title">customer List</h4>
                                <!-- <p class="m-0 subtitle">Lorem Ipsum</p> -->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active p-4">

                                <?php
                                $sql = "SELECT * FROM tbl_customer LEFT JOIN tbl_account ON tbl_account.tbl_account_id=tbl_customer.tbl_account_id";
                                $m->sql = $sql;
                                $record = $m->selectRaw();
                                ?>

                                <div class="table-responsive">
                                    <table id="datatable-customer" class="dt-table display table" style="width: calc(100% - 2px)">
                                        <thead>
                                            <tr class='text-center'>
                                                <td class='text-center'>
                                                    <label class='mb-0'>ID</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Name</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Username</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Password</label>
                                                </td>
                                                <!-- <td class=" text-center">
                                                    <label class='mb-0'>Action</label>
                                                </td> -->
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            foreach ($record as $k => $r) {
                                                extract($r);

                                            ?>

                                                <tr>
                                                    <td class="text-center">
                                                        <?= $tbl_customer_id; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $customer_name; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $username; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $password; ?>
                                                    </td>
                                                    <!-- <td class="text-center ">
                                                        <button type="button" class="btn btn-outline-info btn-action me-2" onclick="editInfo(<?= $k ?>)"><i class="bi bi-pen"></i></button>
                                                        <button type="button" class="btn btn-outline-danger btn-action me-2" onclick="deleteInfo('tbl_customer','tbl_customer_id',<?= $tbl_customer_id;  ?>)"><i class="bi bi-trash"></i></button>
                                                    </td> -->
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