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
                                <h4 class="card-title">sales List</h4>
                                <!-- <p class="m-0 subtitle">Lorem Ipsum</p> -->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active p-4">

                                <?php
                                $sql = "SELECT * FROM tbl_sales  LEFT JOIN tbl_order ON tbl_order.tbl_order_id=tbl_sales.tbl_order_id";
                                $m->sql = $sql;
                                $record = $m->selectRaw();
                                ?>

                                <div class="table-responsive">
                                    <table id="datatable-sales" class="dt-table display table" style="width: calc(100% - 2px)">
                                        <thead>
                                            <tr class='text-center'>
                                                <td class='text-center'>
                                                    <label class='mb-0'>ID</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Sales No.</label>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Order No.</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Amount</label>
                                                </td>
                                                <td class='text-center'>
                                                    <label class='mb-0'>Datetime Sales</label>
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

                                                <span class="row-td" id="td-<?= $k ?>-tbl_sales-tbl_sales_id" hidden><?= $tbl_sales_id; ?></span>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_sales-tbl_order_id" hidden><?= $tbl_order_id; ?></span>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_sales-amount" hidden><?= $amount; ?></span>

                                                <span class="row-td" id="td-<?= $k ?>-tbl_sales-datetime_sales" hidden><?= $datetime_sales; ?></span>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $tbl_sales_id; ?></td>
                                                    <td class="text-center">
                                                        <?= $sales_no; ?></td>
                                                    <td class="text-center">
                                                        <?= $order_no; ?></td>
                                                    <td class="text-center">
                                                        <?= $amount; ?></td>
                                                    <td class="text-center">
                                                        <?= $datetime_sales; ?></td>
                                                    <td class="text-center ">
                                                        <button type="button" class="btn btn-outline-info btn-action me-2" onclick="editInfo(<?= $k ?>)"><i class="bi bi-pen"></i></button>
                                                        <button type="button" class="btn btn-outline-danger btn-action me-2" onclick="deleteInfo('tbl_sales','tbl_sales_id',<?= $tbl_sales_id;  ?>)"><i class="bi bi-trash"></i></button>
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