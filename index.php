<?php
session_start();
include 'class/method.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_account WHERE username = '$username' AND password = '$password'";
    $m->sql = $sql;
    $res = $m->selectRaw();

    if ($res) {

        $_SESSION['agri_type'] = $res[0]['account_type'];
        $_SESSION['agri_id'] = $res[0]['tbl_account_id'];

        if ($res[0]['account_type'] == 'admin') {
            echo '<script>window.location.href = "dashboard.php"</script>';
        } else if ($res[0]['account_type'] == 'association') {
            echo '<script>window.location.href = "dashboard2.php"</script>';
        } else {
            echo '<script>window.location.href = "dashboard3.php"</script>';
        }
    } else {
        echo '<script>alert("Username or Password is incorrect.")</script>';
    }
}
?>
<title>Agrikulture</title>

<link rel="stylesheet" href="css/variable.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/modal.css">

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="closeModalBtn">&times;</span>
        <h2 class="modal-title">Company Name</h2>
        <p>
        <form method="post">
            <input type="text" name="username" class="input-modal" placeholder="USERNAME" required>
            <input type="password" name="password" class="input-modal" placeholder="PASSWORD" required>
            <hr>
            <button type="submit" name="submit" class="modal-submit">Sign-In</button>
        </form>
        </p>
    </div>
</div>

<div id="myModal2" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="closeModalBtn2">&times;</span>
        <h2 class="modal-title">Company Name</h2>
        <p>
        <form method="post" action="functions/register.php">
            <select name="type" class="input-modal">
                <option value="customer">Customer</option>
                <option value="driver">Driver</option>
            </select>
            <input type="text" name="name" class="input-modal" placeholder="NAME" required>
            <input type="text" name="username" class="input-modal" placeholder="USERNAME" required>
            <input type="password" name="password" class="input-modal" placeholder="PASSWORD" required>
            <hr>
            <button type="submit" name="submit" class="modal-submit">Sign-Up</button>
        </form>
        </p>
    </div>
</div>

<main class="main">
    <nav class="nav container">
        <a href="#" class="logo-image">
            <img src="images\logo\logo.png" alt="logo" />
        </a>
        <div class="nav-content-wrapper">
            <ul class="nav-items">
                <li class="item">
                    <a href="#">Home</a>
                </li>
                <li class="item">
                    <a href="#">About</a>
                </li>
                <li class="item" id="openModalBtn">
                    <a href="#">Login</a>
                </li>
                <li class="item" id="openModalBtn2">
                    <a href="#">REGISTER</a>
                </li>
            </ul>
            <div class="input">
                <img class="icon" src="https://raw.githubusercontent.com/khatri2002/codepen/41da6b21e53c3c6c4add8302e69d578ebac3ac67/landing-page/assets/images/search-icon.svg" alt="search-icon" />
                <input id="search" name="search" type="text" placeholder="Search" />
                <span class="separator"></span>
                <img class="icon bag-icon" src="https://raw.githubusercontent.com/khatri2002/codepen/41da6b21e53c3c6c4add8302e69d578ebac3ac67/landing-page/assets/images/bag-icon.svg" alt="bag-icon" />
            </div>
        </div>
        <label for="hamburger" class="hamburger">
            <input type="checkbox" id="hamburger" />
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </label>
        <label for="hamburger" class="backdrop"></label>
    </nav>

    <section class="main-section container">
        <div class="main-text">
            <div class="main-text-heading-wrapper">
                <h1 class="main-text-heading">
                    <span>Siling-haba</span>
                </h1>
                <img hidden src="https://raw.githubusercontent.com/khatri2002/codepen/refs/heads/main/landing-page/assets/images/chilli-picture.png" alt="" class="decorative-chilli-img" />
            </div>
            <h2 class="main-text-desc">
                prutas ng halamang mula sa saring Capsicum, ang halamang sili, na mga kasapi ng Solanaceae. Sa botanika, tinuturing itong palumpong na beri.
            </h2>
            <div class="add-to-cart-container">
                <button class="add-to-cart-btn">
                    <div class="shopping-cart-icon">
                        <img src="https://raw.githubusercontent.com/khatri2002/codepen/41da6b21e53c3c6c4add8302e69d578ebac3ac67/landing-page/assets/images/shopping-cart.svg" alt="shopping-cart" />
                    </div>
                    <span>Add to Cart</span>
                </button>
                <div class="quantity-container">
                    <button class="quantity-btn">+</button>
                    <div class="current-quantity-text">
                        <span>5</span>
                    </div>
                    <button class="quantity-btn">-</button>
                </div>
            </div>
        </div>
        <div class="product-img-wrapper">
            <img class="product-img" src="images/product/sili.webp" alt="nachos-product" />
        </div>
        <ul class="categories">
            <li class="category category-chilli">
                <div class="category-img-wrapper">
                    <img src="https://raw.githubusercontent.com/khatri2002/codepen/refs/heads/main/landing-page/assets/images/chilli-picture.png" alt="chilli-picture" />
                </div>
                <span>Chilli</span>
            </li>
            <li class="category category-corn">
                <div class="category-img-wrapper">
                    <img src="https://raw.githubusercontent.com/khatri2002/codepen/refs/heads/main/landing-page/assets/images/corn-picture.png" alt="corn-picture" />
                </div>
                <span>Corn</span>
            </li>
            <li class="category category-spices">
                <div class="category-img-wrapper">
                    <img src="https://raw.githubusercontent.com/khatri2002/codepen/refs/heads/main/landing-page/assets/images/spices-picture.png" alt="spices-picture" />
                </div>
                <span>Spices</span>
            </li>
        </ul>
        <img hidden class="chilli-picture-decorative" src="https://raw.githubusercontent.com/khatri2002/codepen/refs/heads/main/landing-page/assets/images/chilli-picture.png" alt="" />
    </section>
</main>


<script>
    // Get modal element and buttons
    const modal = document.getElementById('myModal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');

    // Open the modal
    openModalBtn.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    // Close the modal
    closeModalBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Close modal if clicked outside of the modal content
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>
<script>
    // Get modal element and buttons
    const modal2 = document.getElementById('myModal2');
    const openModalBtn2 = document.getElementById('openModalBtn2');
    const closeModalBtn2 = document.getElementById('closeModalBtn2');

    // Open the modal
    openModalBtn2.addEventListener('click', function() {
        modal2.style.display = 'block';
    });

    // Close the modal
    closeModalBtn2.addEventListener('click', function() {
        modal2.style.display = 'none';
    });

    // Close modal if clicked outside of the modal content
    window.addEventListener('click', function(event) {
        if (event.target === modal2) {
            modal2.style.display = 'none';
        }
    });
</script>