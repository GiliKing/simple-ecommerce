<?php 

include "display.php";
    
if(!isset($_SESSION['users']['name']) && $_SESSION['users']['email'] != "chrisogili12@gmail.com") {
  header("location: index.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>

    <!-- link to bootstrap style -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <style>
        body {
            width: 100%;
            background-color: rgb(28,31,36);
            color: white;
        }
        h2 {
            text-align: center;
        }
        
    </style>

</head>
<body>
<h2 >Add Product To the Store</h2>

<div class="row mt-5">
        <div class="col-md-6 m-auto">
            <form method="POST" enctype="multipart/form-data">
                <?php require "process/forms.php"; ?>
                    <div class="form-label-group">
                        <input type="text" class="form-control" name='name' autofocus>
                        <label>Enter The Product Name</label>
                    </div>

                    <div class="form-label-group">
                        <input type="number" class="form-control" name='amount' autofocus>
                        <label>Enter The Product Amount</label>
                    </div>

                    <div class="form-label-group">
                        <textarea name='info' class="form-control"></textarea>
                        <label>Enter A Info About The Product</label>
                    </div>

                    <div class="form-label-group">
                        <label>Upload Product Image</label>
                        <input type="file" name="image">
                    </div>

                    <input type="hidden" name="addName" value="<?php echo $name; ?>">
                    <input type="hidden" name="addEmail" value="<?php echo $email; ?>">

                    <button name='upload' class="btn btn-lg btn-primary btn-block" type="submit">Add Entry</button>

                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021 Live Search</p>
            </form>
        </div>
</div>
</body>
</html>