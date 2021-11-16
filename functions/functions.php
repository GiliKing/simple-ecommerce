<?php

// register the user to the database
function registerNewUser($name, $email, $password, $token) {

    require "database/connect.php";

    $response = checkUser($email, $password);

    if($response == true) {

        echo "<div class='alert alert-info'>User Already Exit</div>";

    } else {

        $nameEntry = mysqli_real_escape_string($conn, $name);

        $emailEntry = mysqli_real_escape_string($conn, $email);

        $passwordEntry = mysqli_real_escape_string($conn, $password);

        $users_register = "INSERT INTO `users` (`name`, `email`, `password`, `token`) VALUES('$nameEntry', '$emailEntry', md5('$passwordEntry'), '$token')";

        $users_result = mysqli_query($conn, $users_register);

        if($users_result) {

            echo "<div class='alert alert-success'>User Registered Successfully</div>";

            session_start();

            $_SESSION['NewEmail'] = $emailEntry;
            $_SESSION['NewToken'] = $token;
            $_SESSION['users']['verified'] = 0;

            header("location: verify.php");

        } else  {

            mysqli_error($conn);

        }

    }




};


// but first check if the user exit already before registring
function checkUser($email, $password) {

    require "database/connect.php";

    $emailEntry = mysqli_real_escape_string($conn, $email);

    $passwordEntry = mysqli_real_escape_string($conn, $password);

    $user_query = "SELECT * FROM `users` WHERE `email` = '$emailEntry' AND `password` = md5('$passwordEntry') LIMIT 1";

    $users_result = mysqli_query($conn, $user_query);

    if($users_result) {

        if (mysqli_num_rows($users_result) == 1) {
        
            return true;

        } else {

            return false;
            
        }
    }else {
        echo mysqli_error($conn);
    }
}


// login in the user
function loginUser($email, $password) {

    require "database/connect.php";

    $emailEntry = mysqli_real_escape_string($conn, $email);

    $passwordEntry = mysqli_real_escape_string($conn, $password);

    $user_query = "SELECT * FROM `users` WHERE `email` = '$emailEntry' AND `password` = md5('$passwordEntry') LIMIT 1";

    $users_result = mysqli_query($conn, $user_query);

    if($users_result) {

        if (mysqli_num_rows($users_result) == 1) {
            
            session_start();

            $_SESSION['users'] = mysqli_fetch_array($users_result, MYSQLI_ASSOC);

            $verified = $_SESSION['users']['verified'];

            if($verified != 1) {

                $_SESSION['NewEmail'] = $_SESSION['users']['email'];
                $_SESSION['NewToken'] = $_SESSION['users']['token'];

                header("location: verify.php");
                
            }

            if($verified == 1 && $emailEntry == "chrisogili12@gmail.com") {

                header("location: admin.php");

            }

            if($verified == 1 && $emailEntry != "chrisogili12@gmail.com") {

                header("location: user.php");

            }

        } else {

            echo "<div class='alert alert-danger'>Invalid Email/Password </div>";
        }
    } else {
        mysqli_error($conn);
    }

}


function registerPhoto($photoPath, $name, $amount, $info){
	
    require "database/connect.php";

    $nameEntry = mysqli_real_escape_string($conn, $name);

    $amountEntry= mysqli_real_escape_string($conn, $amount);

    $infoEntry = mysqli_real_escape_string($conn, $info);

	$query = "INSERT INTO `product` (`product_image`, `product_name`, `product_info`, `product_amount`) VALUES('$photoPath', '$nameEntry', '$infoEntry', '$amountEntry')";

	$result = mysqli_query($conn, $query);

    if($result) {
        
        echo "<div class='alert alert-success'>Product Added Successfully</div>";

    } else  {
        
       echo mysqli_error($conn);
    }


}


?>