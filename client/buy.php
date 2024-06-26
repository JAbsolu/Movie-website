<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $price = $_POST['price'];
    // Here you can add code to handle the purchase, e.g., save to a database, send a confirmation email, etc.
    echo "You have bought: $item for $$price";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- custom font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../website-images/favicon-32x32.png">
    <!-- css styles -->
    <link rel="stylesheet" href="../website-styles/final-main.css">
    <title>Your Shopping Cart</title>

</head>
<body>
    <header>
        <p>Free Shipping on orders $50 USD and up</p>
    </header>
    <!-- <hr> -->
    <!-- navigation ----------------------------------------------------------------------------- -->
    <div id="nav">
        <div id="logo-menu-container">
            <div class="hamburger-nav">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <!-- mobile logo -->
            <a href="../index.html"><img src="../website-images/logo.svg" alt="logo" id="mobile-logo"></a>
            <!-- cart list -->
            <ul id="cart-list" class="cart-mobile">
                <li>
                    <a href="../cart/cart.html">
                        <p id="cart-icon"><img src="../website-images/icon-cart.svg" alt="cart icon"></p>
                        <p class="cart-icon-quantity" id="home-cart"></p>
                    </a>
                </li>
            </ul>
        </div>

        
        <ul id="main-nav">
            <li><a href="../index.html"><img src="../website-images/logo.svg" alt="logo"></a></li>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../landingPage/landing-page.html">Shop</a></li>
            <li><a href="../about/about.html">About</a></li>
            <li><a href="../contact/contact.html">Contact</a></li>
        </ul>
        <ul id="cart-list" class="cart-web">
            <li>
                <a href="../cart/cart.html">
                    <p id="cart-icon"><img src="../website-images/icon-cart.svg" alt="cart icon"></p>
                    <p class="cart-icon-quantity" id="home-cart" class="cart-web"></p>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile nav substitution -->
    <ul id="mobile-nav">
        <li><a href="../index.html">Home</a></li>
        <li><a href="../landingPage/landing-page.html">Shop</a></li>
        <li><a href="../about/about.html">About</a></li>
        <li><a href="../contact/contact.html">Contact</a></li>
    </ul>

    <div class="container-fluid">
        <!-- banner section ------------------------------------------------------------------ -->

        <section id="cart-section">
            <div id="cart-full">
                <h1 id="cart-h1">Your cart</h1>
                <div class="cart">
                    <div id="inner-div1">
                        <img src="../website-images/image-product-1-thumbnail.jpg" alt="sneakers">
                        <span>
                            <h4 class="product-name"></h4>

                            <p class="price">$</p>
                        </span>
                    </div>
                    <div id="inner-div2">
                        <p>Quantity</p>
                        <div class="cart-quantity">
                            <img src="../website-images/icon-minus.svg" alt="minus icon" class="minus">
                            &nbsp;
                            &nbsp;
                            <p class="quantity-num">0</p>
                            &nbsp;
                            &nbsp;
                            <img src="../website-images/icon-plus.svg" alt="plus icon" class="plus">
                        </div>
                    </div>
                    <div id="inner-div3">
                        <p>Total</p>
                        <p id="cart-total">$</p>
                    </div>
                </div>
            </div>
<!------------------default cart page, empty ---------------->
            <div id="cart-empty">
                <h1 id="cart-empty-h1">Your cart is empty</h1>
                <div class="cart-empty-button-container">
                    <a href="../landingPage/landing-page.html">
                        <input type="button" value="Continue shopping" id="cart_empty-btn">
                    </a>
                </div>
            </div>

        </section>
    <!-- email sbscription -->
        <div id="email-subscription">
            <h2>Subscribe to our emails</h2>
            <p>Join our email list for exclusive offers and the latest news.</p>
            <div id="email-input-container">
                <input type="email" placeholder="Email" autocomplete="email" autocorect="off" value="" id="subscribtion-email">
                <button class="subscription-btn">submit</button>
                <br>
                <span></span>
            </div>
        </div>
    </div>
    <hr>
    <footer>
        <a href="../index.html"><img src="../website-images/logo.svg" alt=""></a>
        <p>Quick links</p>
        <ul>
            <li><a href="../contact/contact.html">Contact</a></li>
            <li><a href="../about/about.html">About</a></li>
            <li><a href="../privacies/privacy.html">Privacy policy</a></li>
        </ul>
    </footer>
<!-----------------------------------------------Javascript---------------------------------------------------------------------->
    <script src="../js/final-project.js"></script>
</body>
</html>