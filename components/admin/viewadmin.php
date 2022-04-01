<?php include("head.php") ?>
<div class="container">
    <?php
    try {
        // This script retrieves all the records from the department table.
        require("../mysqli_connect.php"); // Connect to the database.
        // Make the query:
        // Nothing passed from user safe query									#1
        $query = "SELECT id, firstname, lastname, gender, email, address1, address2, experience, phone 
            FROM admindetails
            ORDER BY id ASC";
        $result = mysqli_query($dbcon, $query); // Run the query.
        if (mysqli_num_rows($result) != 0) { //everything is okay
            if ($result) { // If it ran OK, display the records.
                // Table header. 									#2
                echo
                '<div class="table-responsive">
            <table class="table">';
                echo
                '<thead>
            <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address 1</th>
                        <th>Address 2</th>
                        <th>Phone number</th>
                        <th>Experience</th>
                        <th>Edit</th>
                        <th>Delete</th>
            </tr>
            </thead>
            <tbody>';
                // Fetch and print all the records:							#3
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo
                    '<tr>
                        <td>' . $row['firstname'] . '</td>
                        <td>' . $row['lastname'] . '</td>
                        <td>' . $row['gender'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['address1'] . '</td>
                        <td>' . $row['address2'] . '</td>
                        <td>0' . $row['phone'] . '</td>
                        <td>' . $row['experience'] . '</td>
                        <td><a class="btn btn-primary btn-sm" href="edit.php?id=' . $row['id'] . '">edit</a></td>
                        <td><a class="btn btn-danger btn-sm" href="delete.php?id=' . $row['id'] . '">Delete</a></td>
                        </tr>';
                }
                echo
                '</tbody>
            </table>
            </div>'; // Close the table so that it is ready for displaying.
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

<?php include("footer.php") ?>