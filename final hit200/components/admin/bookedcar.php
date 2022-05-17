<?php include("head.php"); ?>
<div class="container">
    <div class="table-responsive">
        <?php
        try {
            // This script retrieves all the records from the class table.
            require("../mysqli_connect.php"); // Connect to the database.
            // Make the query:
            // Nothing passed from user safe query									#1
            $query = "SELECT *
            FROM bookedcars
            ORDER BY id ASC";
            $result = mysqli_query($dbcon, $query); // Run the query. 
            if (mysqli_num_rows($result) != 0) { //everything is okay
                if ($result) { // If it ran OK, display the records.
                    // Table header. 									#2
                    echo '<table class="table" style="font-size:14px">';
                    echo
                    '<thead>
                    <tr>
                    <thead>
                    <td>Client</td>
                    <td>Car</td>
                    <td>depaturecity</td>
                    <td>destination city</td>
                    <td>Date of return</td>
                    <td>Collection Time</td>
                    <td>dropoffdate</td>
                    <td>dropofftime</td>
                    </thead>
                    </tr>
                    </thead>
                    <tbody>';
                    // Fetch and print all the records:							#3
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        //id, client, car, , destinationcity, , collectiontime, dropoffdate, dropofftime
                        $sql = 'SELECT * FROM clientdetails WHERE id= "' . $row['client'] . '" LIMIT 1'; //fetching a record from department
                        $r = mysqli_query($dbcon, $sql);
                        $ro1 = mysqli_fetch_assoc($r);

                        $sql = 'SELECT * FROM cardetails WHERE id= "' . $row['car'] . '" LIMIT 1'; //fetching a record from department
                        $r = mysqli_query($dbcon, $sql);
                        $ro2 = mysqli_fetch_assoc($r);
                        echo
                        '<tr>
                        <td>' . $ro1['firstname'] . " " . $ro1['lastname'] . '</td>
                        <td>' . $ro2['make'] . " " . $ro2['model'] . '</td>
                        <td>' . $row['depaturecity'] . '</td>
                        <td>' . $row['destinationcity'] . '</td>
                        <td>' . $row['collectiondate'] . '</td>
                        <td>' . $row['collectiontime'] . '</td>
                        <td>' . $row['dropoffdate'] . '</td>
                        <td>' . $row['dropofftime'] . '</td>
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