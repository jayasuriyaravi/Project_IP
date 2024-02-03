<?php
session_start();
if (isset($_SESSION['username'])) {
    $name = $_SESSION['username'];
} else {
    $name = "User";
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: userlogin.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cart Page</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .navbar-brand {
            color: rgb(58, 114, 44);
        }

        h1 {
            color: rgb(58, 114, 44);
            padding: 10px;
            /* transition: color 0.5s; */
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: rgb(58, 114, 44);
            transition: color 0.5s;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow px-5 ">
        <div class="container-fluid px-5 mx-5">
            <a class="navbar-brand" href="#">
                Farmer Market <img src="project_image/logo.jpg" alt=" " width="60px" height="60px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse  text-center " id="navbarText">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-black ">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="Home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="Home.html #about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php #product">Product</a>
                    </li>
                </ul>
                <span class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <?php echo $name; ?>
                        </li>
                        <li><a class="dropdown-item" href="?logout=true">Logout</a></li>
                    </ul>
                </span>
            </div>
        </div>
    </nav>


    <div class="container my-5">
        <h1 class="text-center my-5">Your Cart</h1>

        <!-- Displaying cart items in a container -->
        <div class="cart-container">
            <!-- Cart items will be displayed here -->
        </div>

        <div class="text-end my-4 total-price">
            <h5>Total Price: $0.00</h5>
        </div>
        <div class="text-center">
            <button class="btn btn-primary">Buy Now</button>
        </div>
    </div>

    <footer class="container-fluid bg-dark text-white text-center py-3 mt-5">
        <div class="row p-5 ">
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>We are committed to providing the best products and services to our customers.</p>
            </div>
            <div class="col-md-4">
                <h5>Contact Information</h5>
                <p>Email: contact@ecommercesite.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="my-3"><a class="nav-link" href="#">Home</a></li>
                    <li class="my-3"><a class="nav-link" href="#">Products</a></li>
                    <li class="my-3"><a class="nav-link" href="#">About Us</a></li>
                    <li class="my-3"><a class="nav-link" href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p>&copy; 2023 Your E-Commerce Site. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to remove item from the cart
        function removeFromCart(index) {
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            cartItems.splice(index, 1);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            renderCartItems();
        }

        // Function to increment the quantity of an item
        function incrementQuantity(index) {
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            cartItems[index].quantity = cartItems[index].quantity + 1 || 1;
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            renderCartItems();
        }

        // Function to decrement the quantity of an item
        function decrementQuantity(index) {
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            if (cartItems[index].quantity > 1) {
                cartItems[index].quantity = cartItems[index].quantity - 1;
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                renderCartItems();
            }
        }

        // Render the cart items and calculate the total price
        function renderCartItems() {
            const cartContainer = document.querySelector('.cart-container');
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            let totalPrice = 0;

            cartContainer.innerHTML = '';

            cartItems.forEach((item, index) => {
                const cartItem = document.createElement('div');
                const itemTotal = item.price * (item.quantity || 1);
                totalPrice += itemTotal;
                cartItem.innerHTML = `
                <div class="row my-4">
                    <div class="col-md">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="project_image/${item.image}" class="img-fluid rounded-start" alt="Product Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">${item.name}</h5>
                                        <p class="card-text">Price: $${item.price}</p>
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-secondary me-2" onclick="decrementQuantity(${index})">-</button>
                                            <span>${item.quantity || 1}</span>
                                            <button class="btn btn-secondary ms-2" onclick="incrementQuantity(${index})">+</button>
                                            <button class="btn btn-danger ms-2" onclick="removeFromCart(${index})">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                cartContainer.appendChild(cartItem);
            });

            const totalElement = document.querySelector('.total-price');
            totalElement.textContent = `Total Price: $${totalPrice.toFixed(2)}`;
        }

        // Render the initial cart items
        renderCartItems();
    </script>


</body>

</html>