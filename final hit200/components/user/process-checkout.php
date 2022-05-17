<?php
try {
    $errors = array(); //  array of errors
    //Check for a depature city
    $depaturecity = filter_var($_POST['depaturecity'], FILTER_SANITIZE_STRING);  //Removing potential SQL Injection
    if (empty($depaturecity)) {
        $errors[] = 'You forget to enter depature city';
    }
    $destinationcity = filter_var($_POST['destinationcity'], FILTER_SANITIZE_STRING);  //Removing potential SQL Injection
    if (empty($destinationcity)) {
        $errors[] = 'You forget to enter destination city';
    }
    $collectiondate = filter_var($_POST['collectiondate'], FILTER_SANITIZE_STRING); //Removing potential sql injection
    if (empty($collectiondate)) {
        $errors[] = 'You forget to enter collection date';
    }
    $collectiontime = filter_var($_POST['pickuptime'], FILTER_SANITIZE_STRING); //Removing potential sql injection
    if (empty($collectiontime)) {
        $errors[] = 'You forget to enter pick up time';
    }
    $dropoffdate = filter_var($_POST['dropoffdate'], FILTER_SANITIZE_STRING); //Removing potential sql injection
    if (empty($dropoffdate)) {
        $errors[] = 'You forget to enter drop off date';
    }
    $dropofftime = filter_var($_POST['dropofftime'], FILTER_SANITIZE_STRING); //Removing potential sql injection
    if (empty($dropofftime)) {
        $errors[] = 'You forget to enter dropoff time';
    }
    if (empty($errors)) {
        //code
        //session email, car and class
        //echo $_SESSION['carid'];
        //echo $_SESSION['emailid'];
        require('../mysqli_connect.php'); //todo: Connect to the db
        //! If no problems encountered, register user in the database
        //todo: Insert the record into the database
        //todo: Make a query
        $query = "INSERT INTO bookedcars (id, client, car, depaturecity, destinationcity, collectiondate, collectiontime, dropoffdate, dropofftime)";
        $query .= "VALUES (' ',?,?,?,?,?,?,?,?)";
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        //*use prepared statement to ensure that only text is inserted
        //todo bind fields to SQL Statement
        mysqli_stmt_bind_param($q, 'ssssssss', $_SESSION['emailid'], $_SESSION['carid'], $depaturecity, $destinationcity, $collectiondate, $collectiontime, $dropoffdate, $dropofftime);
        //todo Execute the query
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) { // One record inserted 
            $url = "profile.php";
            header("Location:" . $url);
        } else { // If it did not run OK.
            // Public message:
            $errorstring .= "System Error<br />You could not be registered due ";
            $errorstring .= "to a system error. We apologize for any inconvenience.";
            echo '<div class="alert alert-danger">' . $errorstring . '</div>';
            exit();
        }
    } else {
        $errorstring = '';
        foreach ($errors as $msg) { //print the errors
            $errorstring .= "$msg<br>\n";
        }
        echo '<div class="alert alert-danger">';
        echo $errorstring;
        echo '</div>';
    }
} catch (Exception $e) {
    print $e->getMessage();
} catch (Error $e) {
    print $e->getMessage();
}
