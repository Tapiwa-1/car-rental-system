<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="img/logo.png" alt="" class="navbar-brand img-fluid" style="width: 100px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Contact</a>
                    </li>
                    <li>
                        <a href="components/user/user.php" class="btn btn-primary nav-link text-light ms-auto">Book Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-5">
                    <img src="img/cover.png" alt="placeholder" class="img-fluid">
                </div>
                <div class="col-md-7 text-center">
                    <h3>Welecome</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id quam, inventore numquam molestiae sed totam? Numquam dolorum odio omnis tenetur deserunt. Ea, nemo perferendis corrupti sint mollitia nulla alias nam?
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id quam, inventore numquam molestiae sed totam? Numquam dolorum odio omnis tenetur deserunt. Ea, nemo perferendis corrupti sint mollitia nulla alias nam?
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light">
            <h3 class="text-center py-2">Hot Deals</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/fortuner.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Totota Fortuner</h5>
                            <p class="card-text">
                                OFFROAD SUV<br>
                                Up to 7 passengers<br>
                                5 door car
                            </p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/audi.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Audi Q5</h5>
                            <p class="card-text">
                                SUV<br>
                                Up to 7 passengers<br>
                                5 door car
                            </p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/benz.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                SUV<br>
                                Up to 7 passengers<br>
                                5 door car
                            </p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light">
            <h3 class="text-center py-2">Services</h3>
            <a href="services"></a>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <!--This is a row-->
                <div class="col-md-3 p-2 d-block text-center border mx-md-2">
                    <div class="service-icon mx-auto my-5">
                        <img src="img/24_7.png" class="service-icon" />
                    </div>
                    <div class="service-heading pb-3 border-bottom">
                        <h4>27/7 </h4>
                    </div>
                    <div class="service-par my-4">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod.
                        </p>
                    </div>
                </div>
                <!--End col-->
                <div class="col-md-3 p-2 d-block text-center border mx-md-2">
                    <div class="service-icon mx-auto my-5">
                        <img src="img/electric.jpg" class="service-icon" />
                    </div>
                    <div class="service-heading pb-3 border-bottom">
                        <h4>Electric Cars</h4>
                    </div>
                    <div class="service-par my-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni eligendi maxime cumque, atque at voluptatum.</p>
                    </div>
                </div>
                <!--End col-->
                <div class="col-md-3 p-2 d-block text-center border mx-md-2">
                    <div class="service-icon mx-auto my-5">
                        <img src="img/best.png" class="service-icon" />
                    </div>
                    <div class="service-heading pb-3 border-bottom">
                        <h4>Quality Cars</h4>
                    </div>
                    <div class="service-par my-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni eligendi maxime cumque, atque at voluptatum.</p>
                    </div>
                </div>
                <!--End col-->
            </div>
            <!--End row-->

            <div class="row d-flex justify-content-between mt-md-2">
                <!--This is a row-->
                <div class="col-md-3 p-2 d-block text-center border mx-md-2 ">
                    <div class="service-icon mx-auto my-5">
                        <img src="img/choffer.jpg" class="service-icon" />
                    </div>
                    <div class="service-heading pb-3 border-bottom">
                        <h4>Heading</h4>
                    </div>
                    <div class="service-par my-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni eligendi maxime cumque, atque at voluptatum.</p>
                    </div>
                </div>
                <!--End col-->
                <div class="col-md-3 p-2 d-block text-center border mx-md-2">
                    <div class="service-icon mx-auto my-5">
                        <img src="img/Fuel-29.jpg" class="service-icon" />
                    </div>
                    <div class="service-heading pb-3 border-bottom">
                        <h4>Heading</h4>
                    </div>
                    <div class="service-par my-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni eligendi maxime cumque, atque at voluptatum.</p>
                    </div>
                </div>
                <!--End col-->
                <div class="col-md-3 p-2 d-block text-center border mx-md-2">
                    <div class="service-icon mx-auto my-5">
                        <img src="img/offroad.jpg" class="service-icon" />
                    </div>
                    <div class="service-heading pb-3 border-bottom">
                        <h4>Heading</h4>
                    </div>
                    <div class="service-par my-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni eligendi maxime cumque, atque at voluptatum.</p>
                    </div>
                </div>
                <!--End col-->
            </div>
            <!--End row-->
        </div>
        <div class="container-fluid bg-light">
            <h3 class="text-center py-2">Book Car Here</h3>
        </div>
    </main>
    <!-- Footer -->
    <footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</body>

</html>