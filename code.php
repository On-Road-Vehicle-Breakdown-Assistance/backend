<?php 
session_start();
include('dbcon.php');


//create the database
if(isset($_POST['save_workshop'])){
    $w_name = $_POST['w_name'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];


    $postData = [
        'w_name'=> $w_name,
        'location'=> $location,
        'phone'=> $phone,
        'latitude'=> $latitude,
        'longitude'=> $longitude,
    ];
    $ref_table = "workshops";
    $postRef_result = $database->getReference($ref_table)->push($postData);

    if($postRef_result){
        $_SESSION['status'] ="Workshop Added Successfully";
        header('Location: index.php');
    }
    else{
        $_SESSION['status'] ="Workshop failed to Add";
        header('Location: index.php');
    }
}

//update-button from the database
if(isset($_POST['update_workshop']))
{
    $key = $_POST['key'];
    $w_name = $_POST['w_name'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];


    $updateData = [
        'w_name'=> $w_name,
        'location'=> $location,
        'phone'=> $phone,
        'latitude'=> $latitude,
        'longitude'=> $longitude,
    ];
    $ref_table = 'workshops/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);

    if($updatequery_result){
        $_SESSION['status'] ="Workshop Updated Successfully";
        header('Location: index.php');
    }
    else{
        $_SESSION['status'] ="Failed to Update";
        header('Location: index.php');
    }
}

//delete-button from the database
if(isset($_POST['delete_btn']))
{
    $del_id = $_POST['delete_btn'];

    $ref_table = 'workshops/'.$del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if($deletequery_result){
        $_SESSION['status'] ="Workshop Deleted Successfully";
        header('Location: index.php');
    }
    else{
        $_SESSION['status'] ="Failed to Delete";
        header('Location: index.php');
    }

}

//Register the Admin if required
if(isset($_POST['register_btn']))
{
    $fname = $_POST['fname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'phoneNumber' => '+91'.$phone,
        'password' => $password,
        'displayName' => $fname,
       
    ];
    
    $createdUser = $auth->createUser($userProperties);

    if($createdUser){
        $_SESSION['status'] ="Created Successfully";
        header('Location: register.php');
        exit();
    }
    else{
        $_SESSION['status'] ="Failed to create";
        header('Location: register.php');
        exit();
    }
}
?>

