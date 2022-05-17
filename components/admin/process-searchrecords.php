<?php
// This section processes submissions from the login form
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //This script is a query that INSERTs a record in the patient records
    //Check that the form has been submitted
    $errors = array(); //Initialize an error array

    //Check for make
    $make = filter_var($_POST['make'], FILTER_SANITIZE_STRING);  //Removing potential SQL Injection
    if ((!empty($make)) && (preg_match('/[a-z\s]/i', $make)) && (strlen($make) <= 30)) {
        //Sanitize the trimmed first name
        $maketrim = $make;
    } else {
        $errors[] = 'Enter make';
    }

    if (empty($errors)) { //everything is okay
        try {
            require('../mysqli_connect.php'); //Connect to the db
            //search if the record exist first else error no such record
            //session['id'] for patient
            $query = 'SELECT * FROM cardetails 
                    WHERE make ="' . $maketrim . '";';

            $result = mysqli_query($dbcon, $query); // Run the query;
            if (mysqli_num_rows($result) != 0) { //everything is okay
                $result = mysqli_query($dbcon, $query); // Run the query;
                if (mysqli_num_rows($result) != 0) { //everything is okay
                    echo '<div class="table-responsive" style="font-size: 12px;">';
                    echo '<table class="table">';
                    echo
                    '<thead>
                    <tr>
                        <td>Make</td>
                        <td>Model</td>
                        <td>Type</td>
                        <td>Year</td>
                        <td>Fuel</td>
                        <td>Class</td>
                        <td>Seats</td>
                        <th>Cost</th>
                        <th>edit</th>
                        <th>Delete</th>
                </tr>
                    </thead>
                    <tbody>';
                    // Fetch and print all the records
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $sql = 'SELECT name FROM class WHERE id= "' . $row['class'] . '" LIMIT 1'; //fetching a record from department
                        $r = mysqli_query($dbcon, $sql);
                        $ro = mysqli_fetch_assoc($r);
                        echo
                        '<tr>
                        <td>' . $row['make'] . '</td>
                        <td>' . $row['model'] . '</td>
                        <td>' . $row['type'] . '</td>
                        <td>' . $row['year'] . '</td>
                        <td>' . $row['fuel'] . '</td>
                        <td>' .  $ro['name'] . '</td>
                        <td>' . $row['seats'] . '</td>
                        <td> $' . $row['cost'] . '</td>
                        <td><a class="btn btn-primary btn-sm" href="editcars.php?id=' . $row['id'] . '">edit</a></td>
                        <td><a class="btn btn-danger btn-sm" href="deletecars.php?id=' . $row['id'] . '">Delete</a></td>
                        </tr>';
                    }
                    echo '</tbody></table></div>'; // Close the table so that it is ready for displaying.
                    mysqli_free_result($result); // Free up the resources.

                } else {
                    $errorstring = 'The make is not in the database';

                    echo '<div class="alert alert-danger m-2">';
                    echo  $errorstring;
                    echo '</div>';
                }
            } else { //The firstname and lastname is not in the database
                $errorstring = 'The name is not in the database';

                echo '<div class="alert alert-danger m-2">';
                echo  $errorstring;
                echo '</div>';
            }
        } catch (Exception $e) {
            print $e->getMessage();
        } catch (Error $e) {
            print $e->getMessage();
        }
    } else {
        $errorstring = "Error! The following errors occured: <br>";
        foreach ($errors as $msg) { //print the errors
            $errorstring .= "- $msg<br>\n";
        }
        $errorstring .= "Please try again.<br>";
        $errorstring .= "Please try again.<br>";
        echo '<div class="col-50" style="display: block; margin:auto">';
        echo '<div class="row text-center align-content-center" style="display: block;">';
        echo '<p style="color:red">' . $errorstring . '</p>';
        echo '</div>';
        echo '</div>';
    }
} // end if ($_SERVER['REQUEST_METHOD'] == 'POST') 