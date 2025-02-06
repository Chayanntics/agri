<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li class="menu-title">Company Name</li>

            <?php if (in_array($_SESSION['agri_type'], ['admin'])) { ?>
                <li>
                    <a href="dashboard.php" class="" aria-expanded="false" title="Product">
                        <div class="menu-icon">
                            <i class="bi bi-house " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Home</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (in_array($_SESSION['agri_type'], ['association'])) { ?>
                <li>
                    <a href="dashboard2.php" class="" aria-expanded="false" title="Product">
                        <div class="menu-icon">
                            <i class="bi bi-house " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Home</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (in_array($_SESSION['agri_type'], ['customer'])) { ?>
                <li>
                    <a href="dashboard3.php" class="" aria-expanded="false" title="Product">
                        <div class="menu-icon">
                            <i class="bi bi-house " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Home</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (in_array($_SESSION['agri_type'], ['driver'])) { ?>
                <li>
                    <a href="dashboard4.php" class="" aria-expanded="false" title="Product">
                        <div class="menu-icon">
                            <i class="bi bi-house " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Home</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (in_array($_SESSION['agri_type'], ['admin', 'association'])) { ?>
                <li>
                    <a href="javascript:void(0);" class="has-arrow" aria-expanded="false" title="Produce">
                        <div class="menu-icon">
                            <i class="bi bi-flower1 " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Produce</span>
                    </a>
                    <ul aria-expanded="false" class="mm-collapse" style="">
                        <?php if (in_array($_SESSION['agri_type'], ['admin'])) { ?>
                            <li><a href="category.php" title="Category">Category</a></li>
                            <li><a href="crop.php" title="Crop">Crop</a></li>
                        <?php } ?>
                        <?php if (in_array($_SESSION['agri_type'], ['association'])) { ?>
                            <li><a href="merchandise.php" title="Stockin">Merchandise</a></li>
                            <li><a href="stockin.php" title="Stockin">Stockin</a></li>
                            <!-- <li><a href="stockin_crop.php" title="Stockin Crop">Stockin Crop</a></li> -->
                            <li><a href="dispose.php" title="Dispose">Dispose</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>

            <?php if (in_array($_SESSION['agri_type'], ['association'])) { ?>
                <li>
                    <a href="product.php" class="" aria-expanded="false" title="Product">
                        <div class="menu-icon">
                            <i class="bi bi-journal-album " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Product</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (in_array($_SESSION['agri_type'], ['admin'])) { ?>
                <li>
                    <a href="association.php" class="" aria-expanded="false" title="Association">
                        <div class="menu-icon">
                            <i class="bi bi-buildings " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Association</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (in_array($_SESSION['agri_type'], ['association'])) { ?>
                <li>
                    <a href="farmer.php" class="" aria-expanded="false" title="Farmer">
                        <div class="menu-icon">
                            <i class="bi bi-people " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Farmer</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (in_array($_SESSION['agri_type'], ['admin'])) { ?>
                <li>
                    <a href="customer.php" class="" aria-expanded="false" title="Customer">
                        <div class="menu-icon">
                            <i class="bi bi-people " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Customer</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (in_array($_SESSION['agri_type'], ['admin'])) { ?>
                <li>
                    <a href="driver.php" class="" aria-expanded="false" title="Driver">
                        <div class="menu-icon">
                            <i class="bi bi-people " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Driver</span>
                    </a>
                </li>
            <?php } ?>


            <!-- <li>
                <a href="business.php" class="" aria-expanded="false" title="Business">
                    <div class="menu-icon">
                        <i class="bi bi-buildings " style="font-size: 17px;"></i>
                    </div>
                    <span class="nav-text">Business</span>
                </a>
            </li>

            <li>
                <a href="customer_business.php" class="" aria-expanded="false" title="Customer Business">
                    <div class="menu-icon">
                        <i class="bi bi-people " style="font-size: 17px;"></i>
                    </div>
                    <span class="nav-text">Customer Business</span>
                </a>
            </li> -->

            <!-- <li>
                <a href="order.php" class="" aria-expanded="false" title="Order">
                    <div class="menu-icon">
                        <i class="bi bi-circle " style="font-size: 17px;"></i>
                    </div>
                    <span class="nav-text">Order</span>
                </a>
            </li> -->


            <?php if (in_array($_SESSION['agri_type'], ['admin', 'association'])) { ?>
                <li>
                    <a href="javascript:void(0);" class="has-arrow" aria-expanded="false" title="Produce">
                        <div class="menu-icon">
                            <i class="bi bi-file-earmark-text " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Report</span>
                    </a>
                    <ul aria-expanded="false" class="mm-collapse" style="">
                        <li><a href="sales.php" title="Sales">Sales</a></li>
                        <li><a href="payment.php" title="Payment">Payment</a></li>
                    </ul>
                </li>
            <?php } ?>

            <?php if (in_array($_SESSION['agri_type'], ['admin'])) { ?>
                <li>
                    <a href="payment_method.php" class="" aria-expanded="false" title="Payment Method">
                        <div class="menu-icon">
                            <i class="bi bi-wallet2 " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Payment Method</span>
                    </a>
                </li>
            <?php } ?>

            <!-- <li>
                <a href="delivery.php" class="" aria-expanded="false" title="Delivery">
                    <div class="menu-icon">
                        <i class="bi bi-circle " style="font-size: 17px;"></i>
                    </div>
                    <span class="nav-text">Delivery</span>
                </a>
            </li> -->

            <?php if (in_array($_SESSION['agri_type'], ['customer'])) { ?>
                <li>
                    <a href="address.php" class="" aria-expanded="false" title="Address">
                        <div class="menu-icon">
                            <i class="bi bi-map " style="font-size: 17px;"></i>
                        </div>
                        <span class="nav-text">Address</span>
                    </a>
                </li>
            <?php } ?>

            <li class=" menu-title">Settings</li>

            <li>
                <a href="logout.php" class="" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="bi bi-door-closed " style="font-size: 17px;"></i>
                    </div>
                    <span class="nav-text">Logout</span>
                </a>
            </li>


        </ul>
    </div>
</div>