<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.js"></script>
</head>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="./img/HIT_logo.png" alt="" class="navbar-brand" style="width: 100px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./contact.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown ms-lg-auto me-lg-4">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Open Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./components/patient/patient.php">Patient</a></li>
                            <li><a class="dropdown-item" href="./components/practitioner/practitioner.php">Practitioner</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!--<li><a class="dropdown-item" href="./components/finance/finance.php">Finance</a></li>-->
                            <li><a class="dropdown-item" href="./components/administration/administrator.php">Admin</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="mb-5">
        <main>

            <div class="container about-us banner">
                <div class="row ">
                    <h1 class="my-md-5 py-5 text-center">ABOUT US</h1>
                </div>
            </div>
            <div class="container">
                <div class="row my-2">
                    <div class="col-md-2">
                        <h3>Who Are We?</h3>
                    </div>
                    <div class="col">
                        <p>A private clinical institution serving and affiliated to the Harare Institute of Technology. Our campus clinic was introduced in conjuction with the official opening of the institute in 1988. Since then it has grown from serving only the administration and students within the institute to the whole community around Belvedere, and other visiting residents in need of clinical care.</p>
                    </div>
                </div>
                <br>
                <br>
                <div class="row my-2">
                    <div class="col-md-2">
                        <h3>Our Aims</h3>
                    </div>
                    <div class="col text-justify">
                        <p><span class="my-2 text-justify">To offer the best (safe, secure and high quality) on campus health care service in and around Zimbabwe.</span></p>
                        <p><span class="my-2">To support and develop community health and medical services.</span></p>
                        <p><span class="my-2">To enhance the functions of the Center for Clinical Research,foster a clinical research ethos, and promote clinical research and trials.</span></p>
                    </div>
                </div>
            </div>
            <div class="container headings text-md-center my-2">
                <h1>Our Team</h1>
            </div>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                    <div class="col mb-4">
                        <div class="card">
                            <img src="img\tapiwa.JPG" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Tapiwa Motsi</h5>
                                <p class="card-text">General Practitioner - MS in Biotechnology (China)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="img\lionel.JPG" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Lionel Edwards</h5>
                                <p class="card-text">Optician - MS in Optometry (Canada)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="img\blessing.JPG" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Blessing Kashava</h5>
                                <p class="card-text">Pharmacist - AD in Pharmaceutical Science (Malaysia)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="img\charity.JPG" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Charity Zimunya</h5>
                                <p class="card-text">Nurse - BS in Health and Physical Fitness (Seychelles)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="img\dellon.JPG" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Dellon Gosha</h5>
                                <p class="card-text">Dentist - PhD in Dentristy (Zimbabwe)</p>
                            </div>
                        </div>
                    </div>
                </div>
        </main>

        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="footer text-center p-3"">
© 2022 Copyright: HIT Clinic Project
</div>
<!-- Copyright -->
</footer>
</body>
</html>