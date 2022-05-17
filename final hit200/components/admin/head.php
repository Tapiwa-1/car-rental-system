<?php
session_start();
if (!isset($_SESSION['user_level']) && $_SESSION['user_level'] != 1) {
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="../../img/logo.png" class="img-fluid clogo" width="100" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="addadmin.php">Add Admin</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="viewadmin.php">View Admin</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="addcar.php">Add Car</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="addcarclass.php">Add Class</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="viewclass.php">View Class</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewcar.php">View Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bookedcar.php">Booked cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clients.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>