<?php
include "layout/header.php";
?>

<div class='container-fluid'>
    <div class='row mt-3'>
        <div class="col-lg-4 col-sm-12 mb-3">

            <div class="card">
                <div class="card-header">
                    <div>
                        <h4 class="card-title">crop Form</h4>
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


                            <input type='hidden' id='form-table' name='table[]' class='none' value='tbl_crop'>

                            <div id="form-div-crop">
                                <div class="form-source">

                                    <input type='hidden' id='crop-tbl_crop_id' name='tbl_crop-tbl_crop_id[]' class='editable none' value=''>
                                    <div class='row'>

                                        <div class='col-md-12 form-group '>
                                            <div class='row mb-2'>

                                                <label for='crop-crop_name' class="text-label form-label">name:</label>

                                                <div class=''>
                                                    <input type='text' name='tbl_crop-crop_name[]' id='crop-crop_name' class='form-control editable ' value='' required>
                                                    <div class="invalid-feedback">
                                                        Please Enter a name.
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class='col-md-12 form-group '>
                                            <div class='row mb-2'>

                                                <label for='crop-tbl_category_id' class="text-label form-label">category:</label>

                                                <div class=''>
                                                    <select name='tbl_crop-tbl_category_id[]' id='crop-tbl_category_id' class='form-control editable ' required>
                                                        <option value=''>-select-</option>

                                                        <?php
                                                        $sql = "SELECT * FROM tbl_category";
                                                        $m->sql = $sql;
                                                        $record = $m->selectRaw();
                                                        foreach ($record as $k => $r) {
                                                            extract($r);
                                                        ?>

                                                            <option value='<?= $tbl_category_id  ?>'><?= $category_name  ?></option>

                                                        <?php

                                                        }

                                                        ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please Enter a category.
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

        </div>


        <div class="col-lg-8 mb-3">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card dz-card">
                        <div class="card-header flex-wrap">
                            <div>
                                <h4 class="card-title">crop List</h4>
                                <!-- <p class="m-0 subtitle">Lorem Ipsum</p> -->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active p-4">

                                <?php
                                $sql = "SELECT * FROM tbl_crop LEFT JOIN tbl_category ON tbl_crop.tbl_category_id = tbl_category.tbl_category_id";
                                $m->sql = $sql;
                                $record = $m->selectRaw();
                                ?>

                                <div class="table-responsive">
                                    <table id="datatable-crop" class="dt-table display table" style="width: calc(100% - 2px)">
                                        <thead>
                                            <tr class='text-center'>
                                                <td class=" text-center">
                                                    <label class='mb-0'>Name</label>
                                                </td>
                                                <td class=" text-center">
                                                    <label class='mb-0'>Category</label>
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
                                                <span class="row-td" id="td-<?= $k ?>-tbl_crop-tbl_crop_id" hidden><?= $tbl_crop_id; ?></span>
                                                <span class="row-td" id="td-<?= $k ?>-tbl_crop-crop_name" hidden><?= $crop_name; ?></span>
                                                <span class="row-td" id="td-<?= $k ?>-tbl_crop-tbl_category_id" hidden><?= $tbl_category_id; ?></span>

                                                <tr>
                                                    <td class="text-center "><?= $crop_name ?></td>
                                                    <td class="text-center "><?= $category_name ?></td>
                                                    <td class="text-center ">
                                                        <button type="button" class="btn btn-outline-info btn-action me-2" onclick="editInfo(<?= $k ?>)"><i class="bi bi-pen"></i></button>
                                                        <button type="button" class="btn btn-outline-danger btn-action me-2" onclick="deleteInfo('tbl_crop','tbl_crop_id',<?= $tbl_crop_id;  ?>)"><i class="bi bi-trash"></i></button>
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