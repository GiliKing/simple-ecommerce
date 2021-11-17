<?php 

    require "database/connect.php";

    $id = $_GET['id'];

    $del = "DELETE FROM `cart` WHERE `id` = $id";

    $rel_del = mysqli_query($conn, $del);

    if($rel_del) {

        mysqli_close($conn); // close the database connection

        header("location:placeOrder.php"); // go to the History page;
    }
?>

<?php
    require "database/connect.php";

    if(isset($_POST['query'])) {

        $id = htmlspecialchars(trim($_POST['query']), ENT_QUOTES);
        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);
        $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES);

        $idEntry = mysqli_real_escape_string($conn, $id);
        $nameEntry = mysqli_real_escape_string($conn, $name);
        $emailEntry = mysqli_real_escape_string($conn, $email);

        $del = "DELETE FROM `cart` WHERE `id` = '$idEntry'";

        $rel_del = mysqli_query($conn, $del);

        if($rel_del) {


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
                    <button onclick="money'.$id.'()">Delete</button>
                    </td>
                    <tr>              
                    ';

                    $_SESSION["button"]["but".$i] = $id;

                    $i++;
                };


                $sum_query = "SELECT SUM(`product_total`) FROM `cart` WHERE `name` = '$nameEntry' AND `email` = '$emailEntry'";

                $sum_result = mysqli_query($conn, $sum_query);

                if($sum_result) {

                    $row = mysqli_fetch_row($sum_result);

                    $sum = $row[0];

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

            } else  {

                mysqli_error($conn);
            }
            
        }

    }

    
?>