<?php
include "layout/header.php";

$sql = "SELECT * FROM tbl_association WHERE tbl_account_id = '$_SESSION[agri_id]'";
$m->sql = $sql;
$res = $m->selectRaw();
$association_id = $res[0]['tbl_association_id'];
?>


<div class='container-fluid'>
    <div class='row mt-3'>
        <div class="col-lg-4 col-sm-12 mb-3">

            <div class="card">
                <div class="card-header">
                    <div>
                        <h4 class="card-title">product Form</h4>
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


                            <input type='hidden' id='form-table' name='table[]' class='none' value='tbl_product'>

                            <div id="form-div-product">
                                <div class="form-source">

                                    <input type='hidden' id='product-tbl_product_id' name='tbl_product-tbl_product_id[]' class='editable none' value=''>
                                    <input type='hidden' id='product-tbl_association' name='tbl_product-tbl_association[]' class='none' value='<?= $association_id ?>'>
                                    <div class='row'>

                                        <div class='col-md-12 form-group '>
                                            <div class='row mb-2'>

                                                <label for='product-product_name' class="text-label form-label">name:</label>

                                                <div class=''>
                                                    <input type='text' name='tbl_product-product_name[]' id='product-product_name' class='form-control editable ' value='' required>
                                                    <div class="invalid-feedback">
                                                        Please Enter a name.
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class='col-md-12 form-group '>
                                            <div class='row mb-2'>

                                                <label for='product-product_price' class="text-label form-label">price:</label>

                                                <div class=''>
                                                    <input type='number' name='tbl_product-product_price[]' id='product-product_price' class='form-control editable ' value='' required>
                                                    <div class="invalid-feedback">
                                                        Please Enter a price.
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row multi-form" hidden>
                                <div class="col-md-12 text-end">
                                    <button type='button' class='btn btn-outline-info btn-sm' onclick="addNewForm('#form-div-product')">Add New (+)</button>
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
                                <h4 class="card-title">product List</h4>
                                <!-- <p class="m-0 subtitle">Lorem Ipsum</p> -->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active p-4">

                                <?php
                                $sql = "SELECT * FROM tbl_product WHERE tbl_association_id = '$association_id'";
                                $m->sql = $sql;
                                $record = $m->selectRaw();
                                ?>

                                <div class="table-responsive">
                                    <table id="datatable-product" class="dt-table display table" style="width: calc(100% - 2px)">
                                        <thead>
                                            <tr class='text-center'>
                                                <td class=" text-center">
                                                    <label class='mb-0'>Product Name</label>
                                                </td>
                                                <td class=" text-center">
                                                    <label class='mb-0'>Price</label>
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
                                                <span class="row-td" id="td-<?= $k ?>-tbl_product-tbl_product_id" hidden><?= $tbl_product_id; ?></span>
                                                <span class="row-td" id="td-<?= $k ?>-tbl_product-product_name" hidden><?= $product_name; ?></span>
                                                <span class="row-td" id="td-<?= $k ?>-tbl_product-product_price" hidden><?= $product_price; ?></span>
                                                <tr>
                                                    <td class="text-center "><?= $product_name ?></td>
                                                    <td class="text-center "><?= $product_price ?></td>
                                                    <td class="text-center ">
                                                        <a href="product_crop.php?id=<?= $tbl_product_id ?>" class="btn btn-outline-primary btn-action me-2">Crops</a>
                                                        <button type="button" class="btn btn-outline-info btn-action me-2" onclick="editInfo(<?= $k ?>)"><i class="bi bi-pen"></i></button>
                                                        <button type="button" class="btn btn-outline-danger btn-action me-2" onclick="deleteInfo('tbl_product','tbl_product_id',<?= $tbl_product_id;  ?>)"><i class="bi bi-trash"></i></button>
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