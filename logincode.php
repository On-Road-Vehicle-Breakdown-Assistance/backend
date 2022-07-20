<?php
session_start();
include('dbcon.php');

if(isset($_POST['login_btn']))
{

    $email = $_POST['email'];
    $clearTextPassword = $_POST['password'];

    try {
       
        $user = $auth->getUserByEmail("$email");
        
        try{
            $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);           
            $idTokenString = $signInResult->idToken();

            try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $uid = $verifiedIdToken->claims()->get('sub');

                $_SESSION['verified_user_id'] = $uid;
                $_SESSION['idTokenString'] = $idTokenString;

                
                header('Location: index.php');
                exit();

            } catch (FailedToVerifyToken $e) {
                echo 'The token is invalid: '.$e->getMessage();
            }
            

        }catch(Exception $e){
            $_SESSION['status'] ="Wrong Password";
            header('Location: login.php');
            exit();
        }


    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        //echo $e->getMessage();
        $_SESSION['status'] ="Invalid Email Address";
        header('Location: login.php');
        exit();
    }

}
else{
    $_SESSION['status'] ="Not allowed";
    header('Location: login.php');
    exit();
}
?>