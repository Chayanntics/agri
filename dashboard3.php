<?php
include "layout/header.php";

$sql = "SELECT * FROM tbl_customer WHERE tbl_account_id = '$_SESSION[agri_id]'";
$m->sql = $sql;
$res = $m->selectRaw();
$customer_id = $res[0]['tbl_customer_id'];

$sql = "SELECT * FROM tbl_product LEFT JOIN tbl_association ON tbl_product.tbl_association_id = tbl_association.tbl_association_id ";
$m->sql = $sql;
$res = $m->selectRaw();
?>

<div class='container-fluid'>
    <div class='row mt-3'>

        <?php

        foreach ($res as $row) {
            extract($row);

            $sql = "SELECT DISTINCT category_name FROM tbl_category WHERE tbl_category_id IN (SELECT tbl_category_id FROM tbl_product_crop pc LEFT JOIN tbl_crop c ON pc.tbl_crop_id = c.tbl_crop_id WHERE pc.tbl_product_id = $tbl_product_id)";
            $m->sql = $sql;
            $cat = $m->selectRaw();
        ?>
            <div class="col-lg-12 col-xl-6 col-xxl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-b-30">
                            <div class="col-md-5 col-xxl-12">
                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="images/no-image.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-xxl-12">
                                <div class="new-arrival-content position-relative">
                                    <h4><a href="ecom-product-detail.html"><?= $product_name ?></a>
                                    </h4>
                                    <div class="comment-review star-rating" hidden>
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                            <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                        </ul>
                                        <span class="review-text">(34 reviews) / </span><a
                                            class="product-review" href="#" data-bs-toggle="modal"
                                            data-bs-target="#reviewModal">Write a review?</a>
                                        <p class="price">$320.00</p>
                                    </div>
                                    <p>Availability: <span class="item"> In stock <i
                                                class="fa fa-check-circle text-success"></i></span></p>
                                    <p>Product code: <span class="item">0405689</span> </p>
                                    <p>Categories:
                                        <?php foreach ($cat as $c) {
                                            extract($c); ?>
                                            <span class="badge badge-success light"><?= $category_name ?></span>
                                        <?php } ?>
                                    </p>
                                    <p class="text-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <hr>
                                    <form action="functions/add_to_cart.php" method="post">
                                        <input type="hidden" name="tbl_product_id" value="<?= $tbl_product_id ?>">
                                        <input type="hidden" name="tbl_customer_id" value="<?= $customer_id ?>">
                                        <div class="d-flex align-items-end flex-wrap mt-3">

                                            <div class="col-5 px-0  mb-1 me-3"></div>
                                            <div class="col-2 px-0  mb-1 me-3">
                                                <input type="number" name="quantity_cart" class="form-control input-btn input-number" value="1">
                                            </div>

                                            <div class="shopping-cart  mb-1 me-3">
                                                <button class="btn btn-success"><i class="fa fa-shopping-basket me-2"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php
include "layout/footer.php";
?>