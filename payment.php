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
                                <h4 class="card-title">payment List</h4>
                                <!-- <p class="m-0 subtitle">Lorem Ipsum</p> -->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active p-4">

                                <?php
                                $sql = "SELECT * FROM tbl_payment LEFT JOIN tbl_payment_method ON tbl_payment_method.tbl_payment_method_id=tbl_payment.tbl_payment_method_id LEFT JOIN tbl_sales ON tbl_payment.tbl_sales_id=tbl_sales.tbl_sales_id";
                                $m->sql = $sql;
                                $record = $m->selectRaw();
                                ?>

                                <div class="table-responsive">
                                    <table id="datatable-payment" class="dt-table display table" style="width: calc(100% - 2px)">
                                        <thead>
                                            <tr class='text-center'>
                                                <td class='text-center'>
                                                    <label class='mb-0'>ID</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Sales No</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Method</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Amount Paid</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Datetime Paid</label>
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

                                                <span class="row-td" id="td-<?= $k ?>-tbl_payment-tbl_payment_id" hidden><?= $tbl_payment_id; ?></span>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_payment-tbl_payment_method_id" hidden><?= $tbl_payment_method_id; ?></span>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_payment-amount_paid" hidden><?= $amount_paid; ?></span>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_payment-datetime_paid" hidden><?= $datetime_paid; ?></span>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $tbl_payment_id; ?></td>
                                                    <td class="text-center">
                                                        <?= $sales_no; ?></td>
                                                    <td class="text-center">
                                                        <?= $payment_method; ?></td>
                                                    <td class="text-center">
                                                        <?= $amount_paid; ?></td>
                                                    <td class="text-center">
                                                        <?= $datetime_paid; ?></td>
                                                    <td class="text-center ">
                                                        <button type="button" class="btn btn-outline-info btn-action me-2" onclick="editInfo(<?= $k ?>)"><i class="bi bi-pen"></i></button>
                                                        <button type="button" class="btn btn-outline-danger btn-action me-2" onclick="deleteInfo('tbl_payment','tbl_payment_id',<?= $tbl_payment_id;  ?>)"><i class="bi bi-trash"></i></button>
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