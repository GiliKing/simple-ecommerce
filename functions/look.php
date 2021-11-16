

<?php 

session_start();

// ini_set('display_errors', 1);

// when you click on add to cart
if(isset($_POST['name'])) {


  require "../database/connect.php";

  $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);
  $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES);
  $productName  = htmlspecialchars(trim($_POST['productName']), ENT_QUOTES);
  $productAmount = htmlspecialchars(trim($_POST['productAmount']), ENT_QUOTES);
  $quantity = htmlspecialchars(trim($_POST['quantity']), ENT_QUOTES);
  $total = htmlspecialchars(trim($_POST['total']), ENT_QUOTES);



  $nameEntry = mysqli_real_escape_string($conn, $name);

  $emailEntry = mysqli_real_escape_string($conn, $email);

  $productNameEntry = mysqli_real_escape_string($conn, $productName);

  $productAmountEntry = mysqli_real_escape_string($conn, $productAmount);

  $quantityEntry = mysqli_real_escape_string($conn, $quantity);

  $totalEntry = mysqli_real_escape_string($conn, $total);

  $query= "INSERT INTO `cart` (`name`, `email`, `product_name`, `product_amount`, `product_quantity`, `product_total`) VALUES('$nameEntry', '$emailEntry', '$productNameEntry', '$productAmountEntry', '$quantityEntry', '$totalEntry')";

  $result = mysqli_query($conn, $query);


  if($result) {

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
            <button onclick="money'.$id.'">Delete</button>
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

    } else {

      mysqli_error($conn);

    }
          
  } else  {

    mysqli_error($conn);
  }

}
    



// for window on load


if(isset($_POST['checkName'])) {


  require "../database/connect.php";

  $name = htmlspecialchars(trim($_POST['checkName']), ENT_QUOTES);
  $email = htmlspecialchars(trim($_POST['checkEmail']), ENT_QUOTES);

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




?>