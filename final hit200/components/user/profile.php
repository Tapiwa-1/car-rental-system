<?php include("header.php"); ?>
<div class="container">
    <div class="banner py-5 my-1 bg-light">
        <?php
        require("../mysqli_connect.php"); //connect to the db
        //make querry
        $query = "SELECT *
        FROM clientdetails
        WHERE email= '" . $_SESSION['email'] . "'";
        $result = mysqli_query($dbcon, $query); // Run the query.
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<h3>" . $row['firstname'] . "  " . $row['lastname'] . "</h3>";
            echo "<p>" . $row['email'] . "</p>";
        }
        ?>
    </div>
</div>
<?php include("footer.php"); ?>