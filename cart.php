<?php
include "layout/header.php";
?>


		<script>
			function addNewForm(form) {

				let form_copy = $(form).find('.form-source')[0];

				let icon = '<div class="icon-box icon-box-md bg-danger-light me-1 mt-2 hover" onclick="removeFormCopy(this)">\
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">\
									<path d="M12.8833 6.31213C12.8833 6.31213 12.5213 10.8021 12.3113 12.6935C12.2113 13.5968 11.6533 14.1261 10.7393 14.1428C8.99994 14.1741 7.25861 14.1761 5.51994 14.1395C4.64061 14.1215 4.09194 13.5855 3.99394 12.6981C3.78261 10.7901 3.42261 6.31213 3.42261 6.31213" stroke="#FF5E5E" stroke-linecap="round" stroke-linejoin="round"></path>\
									<path d="M13.8055 4.1598H2.50012" stroke="#FF5E5E" stroke-linecap="round" stroke-linejoin="round"></path>\
									<path d="M11.6271 4.1598C11.1037 4.1598 10.6531 3.7898 10.5504 3.27713L10.3884 2.46647C10.2884 2.09247 9.94974 1.8338 9.56374 1.8338H6.74174C6.35574 1.8338 6.01707 2.09247 5.91707 2.46647L5.75507 3.27713C5.65241 3.7898 5.20174 4.1598 4.67841 4.1598" stroke="#FF5E5E" stroke-linecap="round" stroke-linejoin="round"></path>\
								</svg>\
							</div>';

				$(form).append("<div class='row mt-2 multi-form-copy'><div class='col-11'>" + $(form_copy).html() + "</div><div class='col-1'>" + icon + "</div></div>");

			}

			function removeFormCopy(form) {
				$(form).parent().parent().remove();
			}
		</script>
<div class='container-fluid'><div class='row mt-3'>
    <div class="col-lg-4 col-sm-12 mb-3">

        <div class="">

            
            <div class="">

                
<div class="card">
    <div class="card-header">
        <div>
            <h4 class="card-title">cart Form</h4>
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

                
                <input type='hidden' id='form-table' name='table[]' class='none' value='tbl_cart'>

                <div id="form-div-cart">
                    <div class="form-source">

                        <input type='hidden' id='cart-tbl_cart_id' name='tbl_cart-tbl_cart_id[]' class='editable none' value=''>
                        <div class='row'>

                                                                <div class='col-md-12 form-group '>
                                        <div class='row mb-2'>

                                            <label for='cart-quantity_cart' class="text-label form-label">quantity cart:</label>

                                            <div class=''>
                                                <input type='number' name='tbl_cart-quantity_cart[]' id='cart-quantity_cart' class='form-control editable ' value='' required>
                                                                                                <div class="invalid-feedback">
                                                    Please Enter a quantity cart.
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                                                    <div class='col-md-12 form-group '>
                                        <div class='row mb-2'>

                                            <label for='cart-datetime_cart' class="text-label form-label">datetime cart:</label>

                                            <div class=''>
                                                <input type='datetime-local' name='tbl_cart-datetime_cart[]' id='cart-datetime_cart' class='form-control editable ' value='' required>
                                                                                                <div class="invalid-feedback">
                                                    Please Enter a datetime cart.
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                                                    <div class='col-md-12 form-group '>
                                        <div class='row mb-2'>

                                            <label for='cart-tbl_product_id' class="text-label form-label">product:</label>

                                            <div class=''>
                                                <select name='tbl_cart-tbl_product_id[]' id='cart-tbl_product_id' class='form-control editable ' required>
                                                    <option value=''>-select-</option>
                                                    
<?php
$sql = "SELECT * FROM tbl_product"; 
$m->sql = $sql;
$record = $m->selectRaw();
foreach($record as $k => $r)
{
extract($r);
 ?>

                                                        <option value='<?=  $tbl_product_id  ?>'><?=  $product_name  ?></option>
                                                        
<?php

}

?>
                                                </select>
                                                                                                <div class="invalid-feedback">
                                                    Please Enter a product.
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                                                    <div class='col-md-12 form-group '>
                                        <div class='row mb-2'>

                                            <label for='cart-tbl_customer_id' class="text-label form-label">customer:</label>

                                            <div class=''>
                                                <select name='tbl_cart-tbl_customer_id[]' id='cart-tbl_customer_id' class='form-control editable ' required>
                                                    <option value=''>-select-</option>
                                                    
<?php
$sql = "SELECT * FROM tbl_customer"; 
$m->sql = $sql;
$record = $m->selectRaw();
foreach($record as $k => $r)
{
extract($r);
 ?>

                                                        <option value='<?=  $tbl_customer_id  ?>'><?=  $customer_name  ?></option>
                                                        
<?php

}

?>
                                                </select>
                                                                                                <div class="invalid-feedback">
                                                    Please Enter a customer.
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                                        </div>

                    </div>
                </div>

                                        <div class="row multi-form" hidden>
                            <div class="col-md-12 text-end">
                                <button type='button' class='btn btn-outline-info btn-sm' onclick="addNewForm('#form-div-cart')">Add New (+)</button>
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
                                <h4 class="card-title">cart List</h4>
                                <!-- <p class="m-0 subtitle">Lorem Ipsum</p> -->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active p-4">
                                
<?php
$sql = "SELECT * FROM tbl_cart  LEFT JOIN tbl_product ON tbl_product.tbl_product_id=tbl_cart.tbl_product_id LEFT JOIN tbl_customer ON tbl_customer.tbl_customer_id=tbl_cart.tbl_customer_id";
$m->sql = $sql;
$record = $m->selectRaw();
?>

<div class="table-responsive">
    <table id="datatable-cart" class="dt-table display table" style="width: calc(100% - 2px)">
        <thead>
            <tr class='text-center'>
                                    <td class='text-center'>
                        <label class='mb-0'>ID</label>
                    </td>
                                    <td class='text-center'>
                        <label class='mb-0'>Quantity Cart</label>
                    </td>
                                    <td class='text-center'>
                        <label class='mb-0'>Datetime Cart</label>
                    </td>
                                    <td class='text-center'>
                        <label class='mb-0'>Product</label>
                    </td>
                                    <td class='text-center'>
                        <label class='mb-0'>Customer</label>
                    </td>
                                                    <td class=" text-center">
                        <label class='mb-0'>Action</label>
                    </td>
                            </tr>
        </thead>
        <tbody>
            
<?php

foreach($record as $k => $r)
{
extract($r);

?>

<span class="row-td" id="td-<?= $k ?>-tbl_cart-tbl_cart_id" hidden><?= $tbl_cart_id; ?></span>

<span class="row-td" id="td-<?= $k ?>-tbl_cart-quantity_cart" hidden><?= $quantity_cart; ?></span>

<span class="row-td" id="td-<?= $k ?>-tbl_cart-datetime_cart" hidden><?= $datetime_cart; ?></span>

<span class="row-td" id="td-<?= $k ?>-tbl_cart-tbl_product_id" hidden><?= $tbl_product_id; ?></span>

<span class="row-td" id="td-<?= $k ?>-tbl_cart-tbl_customer_id" hidden><?= $tbl_customer_id; ?></span>
                <tr>
                                                                                            <td class="text-center">
<?= $tbl_cart_id; ?></td>
                                                                                            <td class="text-center">
<?= $quantity_cart; ?></td>
                                                                                            <td class="text-center">
<?= $datetime_cart; ?></td>
                                                                                            <td class="text-center">
<?= $product_name; ?></td>
                                                                                            <td class="text-center">
<?= $customer_name; ?></td>
                                                                <td class="text-center ">
<button type="button" class="btn btn-outline-info btn-action me-2" onclick="editInfo(<?= $k ?>)"><i class="bi bi-pen"></i></button>
<button type="button" class="btn btn-outline-danger btn-action me-2" onclick="deleteInfo('tbl_cart','tbl_cart_id',<?=  $tbl_cart_id;  ?>)"><i class="bi bi-trash"></i></button>
</td>
                                    </tr>
            
<?php

}

?>
        </tbody>
    </table>
</div>                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</div></div>
<?php
include "layout/footer.php";
?>