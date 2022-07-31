<?php 
include('authentication.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-">
            <?php
            
                if(isset($_SESSION['status'])){
                echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                unset($_SESSION['status']);
                }
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>
                        Workshops
                        <a href="add-workshops.php" class="btn btn-primary float-end">Add Workshops</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Phone</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('dbcon.php');
                                $ref_table = 'workshops';
                                $fetchdata = $database->getReference($ref_table)->getValue();
                                
                                $i=1;
                                if($fetchdata > 0){
                                    foreach($fetchdata as $key => $row)
                                    {
                                        ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$row['w_name'];?></td>
                                                <td><?=$row['location'];?></td>
                                                <td><?=$row['phone'];?></td>
                                                <td><?=$row['latitude'];?></td>
                                                <td><?=$row['longitude'];?></td>

                                                <td>
                                                    <a href="edit-workshop.php?id=<?= $key; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <!--<a href="delete-workshop.php" class="btn btn-danger btn-sm">Delete</a>-->
                                                    <form action="code.php" method="POST">
                                                        <button type="submit" name="delete_btn" value="<?= $key; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php

                                    }
                                }else{
                                    ?>
                                    <tr>
                                        <td colspan="8">No record found</td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php')?>  