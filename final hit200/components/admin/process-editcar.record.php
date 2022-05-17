<?php
try {
    // After clicking the Edit link in the records view This code is executed 
    // The code looks for a valid user ID, either through GET or POST:
    if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) { // From view-records.php this checks the ID of the record
        $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) { // Form submission.
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    } else { // No valid ID, kill the script.
        echo '<p class="text-center">This page has been accessed in error.</p>';
        exit();
    }

    require('../mysqli_connect.php'); //connect to the database
    // Has the form been submitted?
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = array();
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
        if (empty($errors)) { // If everything's OK.  
            $query = 'UPDATE cardetails
                    SET make=?, model=?, type=?, year=?, fuel=?, sits=?, cost=?
                    WHERE id=? 
                    LIMIT 1';
            $q = mysqli_stmt_init($dbcon);
            mysqli_stmt_prepare($q, $query);
            // bind values to SQL Statement
            mysqli_stmt_bind_param($q, 'sssssssi', $maketrim, $modetrim, $typetrim, $yeartrim, $fuel, $sitstrim, $cost, $id);
            // execute query
            // execute query
            mysqli_stmt_execute($q);
            if (mysqli_stmt_affected_rows($q) == 1) { // Update OK
                // Echo a message if the edit was satisfactory:
                echo
                '<div class="row" style="text-align:center">
                        <p style="color:green">Edit Successfully</p>
                </div>';
                header("Location: viewcar.php");
            } else {
                echo '<p">The user could not be edited due to a system error.';
                echo ' We apologize for any inconvenience.</p><br>'; // Public message.
                echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; // Debugging message.
                // Message above is only for debug and should not display sql in live mode
            }
        } else { // Display the errors.
            echo '<div class="row" style="text-align:center">';
            echo '<p  style="color:red">The following error(s) occurred:<br />';
            foreach ($errors as $msg) { // Echo each error.
                echo " - $msg<br />\n";
            }
            echo '</p><p  style="color:red">Please try again.</p>';
            echo '</div>';
        } // End of if (empty($errors))section.
    }
    // End of the conditionals
    // Select the illness information to display in textboxes:                                    #3
    $q = mysqli_stmt_init($dbcon);
    $query = "SELECT *
            FROM cardetails
            WHERE id=?";
    mysqli_stmt_prepare($q, $query);
    // bind $id to SQL Statement
    mysqli_stmt_bind_param($q, 'i', $id);
    // execute query
    mysqli_stmt_execute($q);
    $result = mysqli_stmt_get_result($q);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
        // Get the information:
        // Create the form:
?>
        <!--Edit here-->
        <div class="container reg-pat" style="width: 100%;">
            <div class="col-100">
                <div class="container">
                    <div class="row">
                        <div class="container mb-md-5">
                            <div class="col-md-4 shadow-sm pt-1 m-auto p-md-2">
                                <form action="editcars.php" method="post">
                                    <div class="form-group">
                                        <label for="">Make</label>
                                        <input type="text" name="make" id="" class="form-control" required value="<?php if (isset($_POST['make'])) echo $_POST['make']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Model</label>
                                        <input type="text" name="model" id="" class="form-control" required value="<?php if (isset($_POST['model'])) echo $_POST['model'];  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Year</label>
                                        <input type="number" name="year" id="" class="form-control" required value="<?php if (isset($_POST['year'])) echo $_POST['year']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Type</label>
                                        <input type="text" name="type" id="" class="form-control" required value="<?php if (isset($_POST['type'])) echo $_POST['type']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fuel</label>
                                        <div class="form-control">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="fuel" id="inlineRadio1" value="petrol" checked>
                                                <label class="form-check-label" for="inlineRadio1">Petrol</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="fuel" id="inlineRadio2" value="Diesel">
                                                <label class="form-check-label" for="inlineRadio2">Diesel</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="fuel" id="inlineRadio2" value="Hybrid">
                                                <label class="form-check-label" for="inlineRadio2">Hybrid</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Select class</label>
                                        <div class="form-control">
                                            <?php
                                            /////require("../mysqli_connect.php"); //connect to the db
                                            //make querry
                                            $query = "SELECT id ,name FROM class";
                                            $result = mysqli_query($dbcon, $query); // Run the query.
                                            if ($result) { // If it ran OK, display the records.
                                                // Table header.
                                                echo '<select name="class" class="w-100 bg-light border-0 p-1">';
                                                echo '<option value="">Class</option>';
                                                // Fetch and print all the records:	
                                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                    echo '<option value="' . $row['id'] . '" name="class">' . $row['name'] . '</option>';
                                                }
                                                echo '</select>';
                                            }
                                            mysqli_close($dbcon); //close connection
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sits</label>
                                        <input type="number" name="sits" id="" class="form-control" required value="<?php if (isset($_POST['sits'])) echo $_POST['sits']; ?>?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $id ?>" />
                                        <!--The hidden input value (id) ensures that no field for the user ID is displayed in the form unless an ID has been passed either from the admin_view_users.php page (via GET) or from the edit_user.php (via POST)-->
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cost</label>
                                        <input type="number" name="cost" id="" class="form-control" required value="<?php if (isset($_POST['cost'])) echo $_POST['cost']; ?>?>">
                                    </div>
                                    <input type="submit" class="btn btn-primary w-100 my-2" name="submit_form">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    } else { // The user could not be validated
        echo '<p class="text-center">This page has been accessed in error.</p>';
    }
    mysqli_stmt_free_result($q);
    mysqli_close($dbcon);
} catch (Exception $e) {
    print "The system is currently busy. Please try again later";
    print "An Error occured. Message: " . $e->getMessage();
} catch (Error $e) {
    print "The system is currently busy. Please try again later";
    print "An Error occured. Message: " . $e->getMessage();
}
?>