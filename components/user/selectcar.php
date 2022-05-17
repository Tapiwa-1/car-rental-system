<?php include("header.php") ?>


<div class="container">
    <div class="row">
        <div class="container mt-md-4">
            <div class="col-md-4 shadow-sm pt-1 m-auto p-md-2">
                <form action="selectcar.php" method="POST">
                    <div class="form-group">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            require('proccess-selectcar.php');
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        try {
                            require("../mysqli_connect.php"); //connect to the db
                            //make querry
                            $query = "SELECT id, make, model, year, type, fuel, class, seats, cost
                            FROM cardetails
                            WHERE class= " . $_SESSION['class'];
                            $result = mysqli_query($dbcon, $query); // Run the query.
                            if ($result) { // If it ran OK, display the records.
                                // Table header.
                                echo '<select class="form-select" aria-label="Default select example" name="car">';
                                echo '<option value="0">Select Car</option>';
                                // Fetch and print all the records:
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['make'] . ' ' . $row['model'] . '</option>';
                                }
                                echo '</select>';
                            } else {
                                echo '<select name="class">';
                                echo '<option value="0">No Cars here</option>';
                                echo '</select>';
                            }
                            mysqli_close($dbcon);
                        } catch (Exception $e) {
                            print $e->getMessage();
                        } catch (Error $e) {
                            print $e->getMessage();
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary my-2 w-100" type="submit" value="Submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php include("footer.php") ?>