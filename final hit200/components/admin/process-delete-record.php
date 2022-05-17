<?php
try {
    // Check for a valid user ID, through GET or POST:
    if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) { // From view table
        $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    } else
if ((isset($_POST['id'])) && (is_numeric($_POST['id']))) { // Form submission.      #1
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    } else { // No valid ID, kill the script.
        //	return to login page
        header("Location: patient-veiwrecords.php");
        exit();
    }
    require('../mysqli_connect.php');
    // Check if the form has been submitted:                                               #2
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sure = htmlspecialchars($_POST['sure'], ENT_QUOTES);
        if ($sure == 'Yes') { // Delete the record.
            // Make the query:
            // Use prepare statement to remove security problems
            $q = mysqli_stmt_init($dbcon);
            mysqli_stmt_prepare($q, 'DELETE FROM admindetails WHERE id=? LIMIT 1');
            // bind $id to SQL Statement
            mysqli_stmt_bind_param($q, "s", $id);
            // execute query
            mysqli_stmt_execute($q);
            if (mysqli_stmt_affected_rows($q) == 1) { // It ran OK
                // Print a message:
                header("Location: viewadmin.php");
            } else { // If the query did not run OK display public message
                echo '<p class="text-center">The record could not be deleted.';
                echo '<br>Either it does not exist or due to a system error.</p>';
                echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>';
                // Debugging message. When live comment out because this displays sql
            }
        } else { // User did not confirm deletion.
            header("Location: administrator-viewrecordsadministrator.php");
        }
    } else { // Show the form.                                                               #3
        $q = mysqli_stmt_init($dbcon);
        $query = "SELECT CONCAT(firstname,' ',lastname) AS name
                FROM admindetails WHERE id=?";
        mysqli_stmt_prepare($q, $query);
        // bind $id to SQL Statement
        mysqli_stmt_bind_param($q, "s", $id);
        // execute query
        mysqli_stmt_execute($q);
        $result = mysqli_stmt_get_result($q);
        $row = mysqli_fetch_array($result, MYSQLI_NUM); // get user info
        if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
            // Display the record being deleted:
            $name = htmlspecialchars($row[0], ENT_QUOTES);
?>
            <div class="row">
                <div class="col-md-4 m-auto">
                    <h5>Are you sure you want to permanently delete <?php echo $name; ?></h5>
                    <p>You wont be able to recover the record if you click Yes!.</p>

                    <form action="delete.php" method="POST" name="deleteform" process-delete-record.php">
                        <div class="row m-auto">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="btn btn-danger w-100" type="submit" name="sure" value="Yes">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="btn btn-color w-100" type="submit" name="sure" value="No">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
<?php
        } else { // Not a valid user ID.
            echo '<p class="text-center">This page has been accessed in error.</p>';
            echo '<p>&nbsp;</p>';
        }
    } // End of the main submission conditional.
    mysqli_stmt_close($q);
    mysqli_close($dbcon);
} catch (Exception $e) {
    print "The system is busy. Please try again.";
    print "An Exception occurred.Message: " . $e->getMessage();
} catch (Error $e) {
    print "The system is currently busy. Please try again soon.";
    print "An Error occured. Message: " . $e->getMessage();
}
?>