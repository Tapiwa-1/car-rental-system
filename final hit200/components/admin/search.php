<?php include("head.php"); ?>
<div class="container">
    <form action="search.php" method="POST" process-searchrecords.php>
        <div class="col-md-4 m-auto">
            <h5>FILL IN THE FOLLOWING</h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control" name="make" required placeholder="Enter make">
                    </div>
                </div>
            </div>
            <input type="submit" value="submit" class="btn btn-primary w-100 mt-2">
        </div>

    </form>
</div>
<div class="container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require('process-searchrecords.php');
    }
    ?>

</div>
<?php include("footer.php"); ?>