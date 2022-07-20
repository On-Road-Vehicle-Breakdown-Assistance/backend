<?php 
session_start();
include('includes/header.php')?>
   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <?php
            
                if(isset($_SESSION['status'])){
                echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                unset($_SESSION['status']);
                }
            ?>

            <div class="card">
                <div class="card-header">
                    <h4 class="text-center"> 
                        ADMIN
                       
                    </h4>
                </div>

                <div class="card-body" style="background: url(img/loginbgs.jpg);">
                    
                    <form action="logincode.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="text" style="border-radius: 25px;" name="email" required class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" style="border-radius: 25px;" name="password" required class="form-control">
                        </div>
                        
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php')?>  