<?php 
session_start();
include('includes/header.php')?>
   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <?php
            
                if(isset($_SESSION['status'])){
                echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                unset($_SESSION['status']);
                }
            ?>

            <div class="card">
                <div class="card-header">
                    <h4>
                        Register
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>

                <div class="card-body">
                    
                    <form action="code.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Full Name</label>
                            <input type="text" name="fname" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Contact Number</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" name="register_btn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php')?>  