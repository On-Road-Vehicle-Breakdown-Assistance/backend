<?php include('includes/header.php')?>
   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        gearUp
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>

                <div class="card-body">
                    
                    <form action="code.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" name="w_name" required class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Location</label>
                            <input type="text" name="location" required class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Contact Number</label>
                            <input type="text" name="phone" required class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Opening Time</label>
                            <input type="text" name="open_at" required class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Closing Time</label>
                            <input type="text" name="close_at" required class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" required name="save_workshop">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php')?>  