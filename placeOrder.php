<!-- display all the ordered product -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        a#look {
            border: 2px solid grey; 
            margin-left: 10px;
            margin-top: 30px;
            padding-left: 100px;
            padding-right: 100px;
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: rgb(28,31,36);
            color: white;
            border-radius: 5px;
            font-size: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>


<div class="container">

    <?php

    include "display.php";

    if(isset($_SESSION['users']['name']) && isset($_SESSION['users']['name'])) {

        require "database/connect.php";

        $name = htmlspecialchars($_SESSION['users']['name'], ENT_QUOTES);
        $email = htmlspecialchars($_SESSION['users']['email'], ENT_QUOTES);

        $nameEntry = mysqli_real_escape_string($conn, $name);

        $emailEntry = mysqli_real_escape_string($conn, $email);

        $cart_query = "SELECT * FROM `cart` WHERE `name` = '$nameEntry' AND `email` = '$emailEntry'";

        $cart_result = mysqli_query($conn, $cart_query);

        if($cart_result) {


            echo '
            <table class= "table">
            <thead>
                <tr>
                    <th>S/N </th>
                    <th>Product Name</th>
                    <th>Product Amount</th>
                    <th>Product Quantity</th>
                    <th>Total Amount</th>
                    <th>Remove Product</th>
                </tr>
            </thead>
            </tbody>

            ';

            $i = 1;

            while ($row = mysqli_fetch_array($cart_result, MYSQLI_ASSOC)) {
                $id = $row['id'];
                $productName = $row['product_name'];
                $productAmount = $row['product_amount'];
                $quantity = $row['product_quantity'];
                $total = $row['product_total'];


                echo '
                <tr>
                <td>'.$i.'</td>
                <td>'.$productName.'</td>
                <td>'.$productAmount.'</td>
                <td>'.$quantity.'</td>
                <td>'.$total.'</td>
                <td>
                <button>Delete</button>
                </td>
                <tr>              
                ';

                $i++;
            };


            $sum_query = "SELECT SUM(`product_total`) FROM `cart` WHERE `name` = '$nameEntry' AND `email` = '$emailEntry'";

            $sum_result = mysqli_query($conn, $sum_query);

            if($sum_result) {

                $row = mysqli_fetch_row($sum_result);

                $sum = $row[0];

                // session_start();

                $_SESSION['sum'] = $sum; 

            };


            echo '

            <tr>
            <td></td>
            <td></td>
            <td><h3>Total</h3><td>
            <td><h3>'.$_SESSION['sum'].'</h3><td>
            <tr>
            </tbody>
            </table>  
            ';

            echo '
            <br>
            <br>
            <a href="#" id="look">Order Now</a>
            ';

        } else  {

            mysqli_error($conn);
        }
    
    } else {

        header("location: index.php");

    }




    ?>

</div>


</body>
</html>

