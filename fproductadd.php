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

        .frow:hover {
            box-shadow: 0 0px 20px 2px rgb(58, 114, 44);
            transition: 0.5s;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow px-5 ">
        <div class="container-fluid px-5 mx-5">
            <a class="navbar-brand" href="Home.html">
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

    <section>
        <div class="container p-5 ">
            <div class="row justify-content-center  ">
                <div class="col-lg-6  border rounded p-5 frow">
                    <h1 class="text-center my-4">Product Insertion Page</h1>
                    <form action="product.php" method="post" enctype="multipart/form-data">
                        <!-- Form fields remain the same -->
                        <div class="mb-3">
                            <label for="product-image" class="form-label">Product Image:</label>
                            <input type="file" class="form-control" id="product-image" name="product-image">
                        </div>
                        <div class="mb-3">
                            <label for="product-name" class="form-label">Product Name:</label>
                            <input type="text" class="form-control" id="product-name" name="product-name">
                        </div>
                        <div class="mb-3">
                            <label for="product-price" class="form-label">Product Price:</label>
                            <input type="text" class="form-control" id="product-price" name="product-price">
                        </div>
                        <div class="mb-3">
                            <label for="product-description" class="form-label">Product Description:</label>
                            <textarea class="form-control" id="product-description" name="product-description"
                                rows="4"></textarea>
                        </div>
                        <div class="text-center ">
                            <button type="submit" class="btn btn-primary m-auto ">Submit</button>
                        </div>
                    </form>
                </div>
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
</body>

</html>