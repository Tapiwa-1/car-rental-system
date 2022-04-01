<?php include("head.php") ?>
</nav>
<div class="container">
    <div class="col-6 m-auto">
        <h4>Add Car</h4>
        <form action="addcar.php" method="post">
            <div class="form-group">
                <!--Validate input--->
                <?php
                if (isset($_POST['submit_form']) == 'POST') {
                    require('process-addcar.php');
                }
                ?>
            </div>
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
            </div>
            <div class="form-group">
                <label for="">Sits</label>
                <input type="number" name="sits" id="" class="form-control" required value="<?php if (isset($_POST['sits'])) echo $_POST['sits']; ?>?>">
            </div>
            <div class="form-group">
                <label for="">Cost</label>
                <input type="number" name="cost" id="" class="form-control" required value="<?php if (isset($_POST['cost'])) echo $_POST['cost']; ?>?>">
            </div>
            <input type="submit" class="btn btn-primary w-100 my-2" name="submit_form">
        </form>
    </div>
</div>
<?php include("footer.php"); ?>