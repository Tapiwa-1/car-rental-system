<?php include("head.php"); ?>
<div class="container">
    <div class="table-responsive">
        <?php
        try {
            // This script retrieves all the records from the class table.
            require("../mysqli_connect.php"); // Connect to the database.
            // Make the query:
            // Nothing passed from user safe query									#1
            $query = "SELECT id, make, model, year, type, fuel, class, seats, cost 
            FROM cardetails
            ORDER BY id ASC";
            $result = mysqli_query($dbcon, $query); // Run the query. 
            if (mysqli_num_rows($result) != 0) { //everything is okay
                if ($result) { // If it ran OK, display the records.
                    // Table header. 									#2
                    echo '<table class="table" style="font-size:14px">';
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
                    // Fetch and print all the records:							#3
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
                    echo '</tbody></table>'; // Close the table so that it is ready for displaying.
                    mysqli_free_result($result); // Free up the resources.
                } else { // If it did not run OK.
                    // Error message:
                    echo '<p class="error">The current users could not be retrieved. We apologize';
                    echo ' for any inconvenience.</p>';
                    // Debug message:
                    // echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
                    exit;
                } // End of if ($result)
            } else {
                $errorstring = 'No records found';
                echo '<div class="col-50" style="display: block; margin:auto">';
                echo '<div class="row text-center align-content-center" style="display: block;">';
                echo '<p style="color:red">' . $errorstring . '</p>';
                echo '</div>';
                echo '</div>';
            }
            mysqli_close($dbcon); // Close the database connection.
        } catch (Exception $e) // We finally handle any problems here                
        {
            print "An Exception occurred. Message: " . $e->getMessage();
            print "The system is busy please try later";
        } catch (Error $e) {
            print "An Error occurred. Message: " . $e->getMessage();
            print "The system is busy please try again later.";
        }
        ?>

    </div>
</div>
<?php include("footer.php"); ?>