<?php include("header.php"); ?>
<div class="container">
    <div class="row">
        <div class="container mt-md-4">
            <div class="col-md-4 shadow-sm pt-1 mb-5 m-auto p-md-2">
                <form action="checkoutcar.php" method="POST">
                    <div class="form-group">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            require('process-checkout.php');
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <h4>FILL IN THE FOLLOWING</h4>
                    </div>
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="depaturecity">
                            <option selected value="">Depature City</option>
                            <option value="Harare" name="depaturecity">Harare</option>
                            <option value="Beitbridge" name="depaturecity">Beitbridge</option>
                            <option value="Bindura" name="depaturecity">Bindura</option>
                            <option value="Bulawayo" name="depaturecity">Bulawayo</option>
                            <option value="Gweru" name="depaturecity">Gweru</option>
                            <option value="Hwange" name="depaturecity">Hwange</option>
                            <option value="Chinhoyi" name="depaturecity">Chinhoyi</option>
                            <option value="Kadoma" name="depaturecity">Kadoma</option>
                            <option value="Chiredzi" name="depaturecity">Chiredzi</option>
                            <option value="Chimanimani" name="depaturecity">Chimanimani</option>
                            <option value="Kariba" name="depaturecity">Kariba</option>
                            <option value="Marondera" name="depaturecity">Marondera</option>
                            <option value="Masvingo" name="depaturecity">Masvingo</option>
                            <option value="Karoyi" name="depaturecity">Karoyi</option>
                            <option value="Mutare" name="depaturecity">Mutare</option>
                            <option value="Vic Falls" name="depaturecity">Vic Falls</option>
                            <option value="Nyanga" name="depaturecity">Nyanga</option>
                            <option value="Plumtree" name="depaturecity">Plumtree</option>
                            <option value="Rusape" name="depaturecity">Rusape</option>
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <select class="form-select" aria-label="Default select example" name="destinationcity">
                            <option selected value="">Destination City</option>
                            <option value="Harare" name="destinationcity">Harare</option>
                            <option value="Beitbridge" name="destinationcity">Beitbridge</option>
                            <option value="Bindura" name="destinationcity">Bindura</option>
                            <option value="Bulawayo" name="destinationcity">Bulawayo</option>
                            <option value="Gweru" name="destinationcity">Gweru</option>
                            <option value="Hwange" name="destinationcity">Hwange</option>
                            <option value="Chinhoyi" name="destinationcity">Chinhoyi</option>
                            <option value="Kadoma" name="destinationcity">Kadoma</option>
                            <option value="Chiredzi" name="destinationcity">Chiredzi</option>
                            <option value="Chimanimani" name="destinationcity">Chimanimani</option>
                            <option value="Kariba" name="destinationcity">Kariba</option>
                            <option value="Marondera" name="destinationcity">Marondera</option>
                            <option value="Masvingo" name="destinationcity">Masvingo</option>
                            <option value="Karoyi" name="destinationcity">Karoyi</option>
                            <option value="Mutare" name="destinationcity">Mutare</option>
                            <option value="Vic Falls" name="destinationcity">Vic Falls</option>
                            <option value="Nyanga" name="destinationcity">Nyanga</option>
                            <option value="Plumtree" name="destinationcity">Plumtree</option>
                            <option value="Rusape" name="destinationcity">Rusape</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Collection Date</label>
                        <input type="date" name="collectiondate" id="" class="form-control" required value="<?php if (isset($_POST['collectiondate'])) echo $_POST['collectiondate']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Pick Up time</label>
                        <input type="time" name="pickuptime" id="" class="form-control" required value="<?php if (isset($_POST['pickuptime'])) echo $_POST['pickuptime']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Drop off Date</label>
                        <input type="date" name="dropoffdate" id="" class="form-control" required value="<?php if (isset($_POST['dropoffdate'])) echo $_POST['dropoffdate']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Drop off time</label>
                        <input type="time" name="dropofftime" id="" class="form-control" required value="<?php if (isset($_POST['dropofftime'])) echo $_POST['dropofftime']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Checkout" name="submit" class="btn btn-primary my-2 w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("footer.php"); ?>