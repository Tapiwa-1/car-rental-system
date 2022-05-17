<?php
// * model
// * make
// * type
// * year
// * fuel
// * class
try {
    //*This script is a query that INSERTs a record in the cars records
    //!Check that the form has been submitted

    $errors = array(); //*Initialize an error array

    //!Check for make
    $make = filter_var($_POST['make'], FILTER_SANITIZE_STRING);  //Removing potential SQL Injection
    if ((!empty($make)) && (preg_match('/[a-z\s]/i', $make)) && (strlen($make) <= 30)) {
        //*Sanitize the trimmed make
        $maketrim = $make;
    } else {
        $errors[] = 'Make missing or not alphabetic and space characters. Max 30';
    }
    //! check for model
    $model = filter_var($_POST['model'], FILTER_SANITIZE_STRING);  //Removing potential SQL Injection
    if ((!empty($model)) && (preg_match('/[a-z\s]/i', $model)) && (strlen($model) <= 30)) {
        //*Sanitize the trimmed model
        $modetrim = $model;
    } else {
        $errors[] = 'Model missing or not alphabetic and space characters. Max 30';
    }
    //! check for type
    $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);  //Removing potential SQL Injection
    if ((!empty($type)) && (preg_match('/[a-z\s]/i', $type)) && (strlen($type) <= 30)) {
        //*Sanitize the trimmed type
        $typetrim = $type;
    } else {
        $errors[] = 'type missing or not alphabetic and space characters. Max 30';
    }
    //! check for fuel
    $fuel = filter_var($_POST['fuel'], FILTER_SANITIZE_STRING); //Removing unnessecary char
    if (empty($_POST["fuel"])) {
        $errors[] = "fuel is required";
    }
    //!Is the year present? If it is, sanitize it 
    $year = filter_var($_POST['year'], FILTER_SANITIZE_STRING); //Removing potential SQL Injection
    if ((!empty($year)) && (strlen($year) <= 30)) {
        //Sanitize the trimmed year
        $yeartrim = (filter_var($year, FILTER_SANITIZE_NUMBER_INT));
        $yeartrim = preg_replace('/[^0-9]/', '', $year);
    } else {
        $yeartrim = NULL;
    }
    //!Is the cost? If it is, sanitize it 
    $cost = filter_var($_POST['year'], FILTER_SANITIZE_STRING); //Removing potential SQL Injection
    if ((!empty($cost)) && (strlen($cost) <= 30)) {
        //Sanitize the trimmed year
        $costtrim = (filter_var($cost, FILTER_SANITIZE_NUMBER_INT));
        $costtrim = preg_replace('/[^0-9]/', '', $costtrim);
    } else {
        $costtrim = NULL;
    }
    //!Is the sits? If it is, sanitize it 
    $sits = filter_var($_POST['sits'], FILTER_SANITIZE_STRING); //Removing potential SQL Injection
    if ((!empty($sits)) && (strlen($sits) <= 30)) {
        //Sanitize the trimmed year
        $sitstrim = (filter_var($cost, FILTER_SANITIZE_NUMBER_INT));
        $sitstrim = preg_replace('/[^0-9]/', '', $sitstrim);
    } else {
        $sitstrim = NULL;
    }
    //! check for class
    $class = filter_var($_POST['class'], FILTER_SANITIZE_STRING); //Removing unnessecary char
    if (empty($class)) {
        $errors[] = 'You did not enter class';
    }
    if (empty($errors)) { //*everything is ok
        require('../mysqli_connect.php'); //todo: Connect to the db
        //! If no problems encountered, register user in the database
        //todo: Insert the record into the database
        //todo: Make a query
        $query = "INSERT INTO cardetails (id, make, model, year, type, fuel, class, seats, cost)";
        $query .= "VALUES (' ',?,?,?,?,?,?,?,?)";
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        //*use prepared statement to ensure that only text is inserted
        //todo bind fields to SQL Statement
        mysqli_stmt_bind_param($q, 'ssssssss', $maketrim, $modetrim, $yeartrim, $typetrim, $fuel, $class, $sits, $cost);
        //todo Execute the query
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) { // One record inserted 
            $url = "viewcar.php";
            header("Location:" . $url);
        } else { // If it did not run OK.
            // Public message:
            $errorstring .= "System Error<br />You could not be registered due ";
            $errorstring .= "to a system error. We apologize for any inconvenience.";
            echo '<div class="alert alert-danger">' . $errorstring . '</div>';
            exit();
        }
    } else { //! display errors
        $errorstring = "";
        foreach ($errors as $msg) { //print the errors
            $errorstring .= "- $msg<br>\n";
        }
        echo '<div class="alert alert-danger">' . $errorstring . '</div>';
    } //// end if (empty($errors)) { //*everything is ok
} catch (Exception $e) {
    print $e->getMessage();
} catch (Error $e) {
    print $e->getMessage();
}
