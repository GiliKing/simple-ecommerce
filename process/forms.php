<?php 

// this is just to check for any errors before registration
if(isset($_POST['register'])) {

    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES);
    $password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES);
    $token = bin2hex(random_bytes(50));  // generate unique token

    $errors = [];


	if(empty($name)){

		$errors[] = "<div class='alert alert-info'>Please enter your name</div>";

	}

	if(empty($email)){
		$errors[] = "<div class='alert alert-info'>Please enter your email</div>";
	}

	if(empty($password)){
		$errors[] = "<div class='alert alert-info'>Enter your password</div>";
	}

    if(empty($errors)){

        require "functions/functions.php";

		$feedback = registerNewUser($name, $email, $password, $token);

        echo $feedback;
    } else {
        forEach($errors as $error) {
            echo "{$error}<br>";
        }

    }
}


// this is just to check for any error befoe login in the user
if(isset($_POST['login'])) {

    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES);
    $password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES);

    $errors = [];

	if(empty($email)){
		$errors[] = "<div class='alert alert-info'>Please enter your email</div>";
	}

	if(empty($password)){
		$errors[] = "<div class='alert alert-info'>Enter your password</div>";
	}

    if(empty($errors)){

        require "functions/functions.php";

		$feedback = loginUser($email, $password);

        echo $feedback;
    } else {
        forEach($errors as $error) {
            echo "{$error}<br>";
        }

    }
}


//Upload 
if(isset($_POST['upload'])){

    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);
    $amount = htmlspecialchars(trim($_POST['amount']), ENT_QUOTES);
    $info = htmlspecialchars(trim($_POST['info']), ENT_QUOTES);
    $token = bin2hex(random_bytes(5));

	$pf = $_FILES['image'];


	$errors = [];

	if(empty($name)){
		$errors[] = "<div class='alert alert-info'>Please enter the product name</div>";
	}

	if(empty($amount)){
		$errors[] = "<div class='alert alert-info'>Please enter the product amount </div>";
	}

	if(empty($info)){
		$errors[] = "<div class='alert alert-info'>Please enter the product info</div>";
	}

	if(empty($pf)){
		$errors[] = "<div class='alert alert-info'>Please choose a file</div>";
	}

	if(empty($errors)){

		$allowed_types = ['image/png', 'image/jpeg', 'image/PNG', 'image/JPG'];


		$pf_name = $token.$pf['name'];
		$pf_type = $pf['type'];
		$pf_tmp = $pf['tmp_name'];

		if(in_array($pf_type, $allowed_types)){

			if(!is_dir("images")){
				mkdir("images");
			}

			$photo_path = "images/{$pf_name}";

			require "functions/functions.php";

			move_uploaded_file($pf_tmp, $photo_path);

			//add this to the database..
			registerPhoto($photo_path, $name, $amount, $info);

		}

        
    } else {
		
        forEach($errors as $error) {
            echo "{$error}<br>";
        }

    }


	

}

?>