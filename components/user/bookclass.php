<?php include("header.php"); ?>
<div class="container">
    <div class="col-6 m-auto">
        <h4>Select Car class</h4>
        <form action="" method="post">
            <div class="form-group">
                <label>Select class</label>
                <div class="form-group">

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require('proccess-bookclass.php');
                    }
                    ?>
                </div>
                <div class="form-control">
                    <?php
                    require("../mysqli_connect.php"); //connect to the db
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
                <input type="submit" value="Continue" class="my-3 btn btn-primary w-100">
            </div>
        </form>
    </div>
</div>
<?php include("footer.php"); ?>