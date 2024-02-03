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
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Buyer page</title>
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

        .card {
            box-shadow: 0 0px 15px 3px rgba(0, 0, 0, 0.2);
            transition: 0.5s;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: rgb(58, 114, 44);
            transition: color 0.5s;
        }

        .card:hover {
            box-shadow: 0px 0px 20px 5px rgba(140, 255, 0, 0.8);
        }
    </style>

    <script>
        function addToCart(name, price, image) {
            const item = {
                name: name,
                price: price,
                image: image
            };
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            cartItems.push(item);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
        }
    </script>
</head>


<body>

    <!-- Example Code -->
    <!-- <div class="container-fluid"> -->
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
                        <a class="nav-link text-dark" href="#product">Product</a>
                    </li>
                </ul>
                <span class="nav-item dropdown me-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <?php echo $name; ?>
                        </li>
                        <li><a class="dropdown-item" href="?logout=true">Logout</li></a>
                    </ul>
                </span>
                <span class="navbar-text ms-2">
                    <a class="nav-link " href="cart.php">Cart <i class="bi bi-cart-dash"></i></a>
                </span>
            </div>
        </div>
    </nav>

    <!-- carousel section -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active " data-bs-interval="2000">
                <img src="project_image/slider.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="project_image/slider2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="project_image/rice.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section id="about" class="bg-body-secondary">
        <div class="container-fluid ">
            <div class="row p-5  align-items-center  ">
                <div class="col-md p-5  ">
                    <img src="project_image/farmer.png" alt="" class="img-fluid ">
                </div>
                <div class="col-md p-5 text-center">
                    <h1>Keep Touch With US</h1>
                    <p class="">Stay updated with the latest offerings, promotions, and seasonal produce from our farm.
                        Sign up for our newsletter and
                        be the first to know about exclusive deals and special events. Connect with us on social media
                        to stay connected and
                        join our vibrant community of food enthusiasts, farmers, and local supporters. We look forward
                        to sharing our passion
                        for fresh, sustainable produce with you!</p>
                </div>
            </div>
        </div>
    </section>


    <section id="fruits" class="">
        <div class="container-fluid p-4 ">
            <div class="text-center">
                <h1>Fresh Fruits</h1>
            </div>
            <div class="row p-3 px-5  text-center justify-content-center">
                <div class="card p-0  m-3 me-5 mb-5 me-5 mb-5 " style="width: 18rem;">
                    <img src="project_image/Apple.jpg" class="card-img-top rounded " alt="" height="300px">
                </div>
                <div class="card p-0  m-3 me-5 mb-5 me-5 mb-5 " style="width: 18rem;">
                    <img src="project_image/bana.png" class="card-img-top rounded " alt="" height="300px">
                </div>
                <div class="card p-0  m-3 me-5 mb-5 me-5 mb-5 " style="width: 18rem;">
                    <img src="project_image/Green Grapes.jpg" class="card-img-top rounded " alt="" height="300px">
                </div>
                <div class="card p-0  m-3 me-5 mb-5 me-5 mb-5 " style="width: 18rem;">
                    <img src="project_image/water.webp" class="card-img-top rounded " alt="" height="300px">
                </div>
            </div>
        </div>
    </section>

    <section id="vegetables" class="bg-body-secondary ">
        <div class="container-fluid p-4">
            <div class="text-center">
                <h1>
                    vegetables
                </h1>
            </div>
            <div class="row p-3 px-5  text-center justify-content-center">
                <div class="card p-0  m-3 me-5 mb-5 me-5 mb-5 " style="width: 18rem;">
                    <img src="project_image/brocoli.jpg" class="card-img-top rounded " alt="" height="300px">
                </div>
                <div class="card p-0  m-3 me-5 mb-5 me-5 mb-5 " style="width: 18rem;">
                    <img src="project_image/Cabbage.jpg" class="card-img-top rounded " alt="" height="300px">
                </div>
                <div class="card p-0  m-3 me-5 mb-5 me-5 mb-5 " style="width: 18rem;">
                    <img src="project_image/Carrot.jpg" class="card-img-top rounded " alt="" height="300px">
                </div>
                <div class="card p-0  m-3 me-5 mb-5 me-5 mb-5 " style="width: 18rem;">
                    <img src="project_image/Cauliflower.jpg" class="card-img-top rounded " alt="" height="300px">
                </div>
            </div>
        </div>
    </section>
    <section id="product" class="">
        <div class="container-fluid justify-content-evenly p-4 ">
            <div class="text-center">
                <h1>Products</h1>
            </div>
            <div class="row p-3 px-5  text-center justify-content-center ">
                
                <?php
                // Replace with your database credentials
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch products from the database
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                // Display products in the buyer's page
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo ' 
                <div class="card p-0 m-3 me-5 mb-5" style="width: 18rem;">
                    <img src="project_image/' . $row["product_image"] . '" class="card-img-top" height="250px" alt="">
                    <div class="card-body">
                        <h5 class="card-title">' . $row["product_name"] . '</h5>
                        <p class="card-text"><b>Price:</b><span>$' . $row["product_price"] . '</span></p>
                        <button class="btn btn-primary" onclick="addToCart(\'' . $row["product_name"] . '\', \'' . $row["product_price"] . '\', \'' . $row["product_image"] . '\')" >Add to Cart</button>
                    </div>
                </div>
             ';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </section>

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




</body>

</html>