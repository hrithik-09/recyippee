<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';

    $user_fname = $_POST['FirstName'];
    $user_lname = $_POST['LastName'];
    $user_email = $_POST['signupEmail'];
    $user_mobile = $_POST['signupMobile'];
    $user_dob=$_POST['DOB'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];
    $gender =$_POST['Gender'];

    // Check whether this email exists
    $existSql = "SELECT * FROM `users` WHERE Email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already in use";
    }
    else{
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`FirstName`,`LastName`,`DOB`,`Gender`,`Email`,`Phone`, `password`) VALUES ('$user_fname',' $user_lname','$user_dob','$gender', '$user_email','$user_mobile', '$hash')";
            $result = mysqli_query($conn, $sql);
            
            if($result){
                $showAlert = true;
                header("Location: /recyippee/index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError = "Passwords do not match";   
        }
    }
    header("Location: /recyippee/index.php?signupsuccess=false&error=$showError");

}
?>