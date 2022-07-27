<?php include('includes/header.php')?>
   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        gearUp - Edit Workshops
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>

                <div class="card-body">
                    
                    <?php
                        include('dbcon.php');
                        if(isset($_GET['id']))
                        {
                            $key_child = $_GET['id'];

                            $ref_table = 'workshops';
                            $getdata = $database->getReference($ref_table)->getChild($key_child)->getValue();
                            
                            if($getdata > 0){

                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="key" value="<?=$key_child;?>">
                                    <div class="form-group mb-3">
                                        <label>Name</label>
                                        <input type="text" name="w_name" value="<?=$getdata['w_name'];?>" required class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Location</label>
                                        <input type="text" name="location" value="<?=$getdata['location'];?>" required class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Contact Number</label>
                                        <input type="text" name="phone" value="<?=$getdata['phone'];?>" required class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Opening Time</label>
                                        <input type="text" name="open_at" value="<?=$getdata['open_at'];?>" required class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Closing Time</label>
                                        <input type="text" name="close_at" value="<?=$getdata['close_at'];?>" required class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary" name="update_workshop">Update</button>
                                    </div>
                                </form>
                            <?php
                            }else{
                               
                                $_SESSION['status'] = "Invalid ID";
                                header('Location: index.php');
                                exit();
                            }
                        }
                        else{
                               
                            $_SESSION['status'] = "Not found";
                            header('Location: index.php');
                            exit();
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php')?>  