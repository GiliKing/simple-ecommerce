<?php 

if($_SESSION['users']['name'] == null && $_SESSION['users']['email'] == null) {
    header("location: index.php");
}


?>



<?php


require "database/connect.php";

$product_query = "SELECT * FROM `product`";

$product_result = mysqli_query($conn, $product_query);

if($product_result) {

    echo '

    <input type="hidden" id="cart_name" value="'.$name.'">
    <input type="hidden" id="cart_email" value="'.$email.'">
    <div class="container">
        <!-- declaring the container colum-->
        <div class="col-lg-12">
            <!-- making the container to be in a row-->
            <div class="row">
    
    ';

    while ($row = mysqli_fetch_array($product_result, MYSQLI_ASSOC)) {
        $id = $row['id'];
        $productImage = $row['product_image'];
        $productName = $row['product_name'];
        $productAmount = $row['product_amount'];
        $productInfo = $row['product_info'];

        echo '

            <!-- span all through the page to collum six-->
            <div class="col-md-6" style="margin-bottom: 20px; margin-top: 20px;">
                <!-- gives it the card feeling -->
                <div class="card">
                    <img class="card-img-top" src="'.$productImage.'" alt="maverick Image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Title: '.$productName.'</h4>
                        <p class="card-text"><b>Info:</b>&nbsp; '.$productInfo.'</p>
                        <p class="card-text"><b>Price:</b>&nbsp; '.$productAmount.'</p>
                        <label><b>How Many Do You Want</b></label>
                        <input type="number" id="cart_num'.$id.'" style="outline:none">
                        
                        <br>
                        <a href="#" class="btn btn-primary" id="funny'.$id.'">Add To Cart</a>

                        <input type="hidden" id="p_name'.$id.'" value="'.$productName.'">
                        <input type="hidden" id="p_amo'.$id.'" value="'.$productAmount.'">
                        <script>
                        document.getElementById("funny'.$id.'").addEventListener("click", function(e) {
                            
                            e.preventDefault();

                            let cart_num = document.getElementById("cart_num'.$id.'").value;

                            let cart_name = document.getElementById("cart_name").value;

                            let cart_email = document.getElementById("cart_email").value;

                            let p_name = document.getElementById("p_name'.$id.'").value;

                            let p_amo = document.getElementById("p_amo'.$id.'").value;

                            let add = p_amo * cart_num;
                    
                            

                            $.ajax({
                                url: "functions/look.php", // containers our query logic
                                method: "POST",
                                data : {
                                    name: cart_name,
                                    email: cart_email,
                                    productName: p_name,
                                    productAmount: p_amo,
                                    quantity: cart_num,
                                    total: add
                                },
                                success: function(data) {

                                    


                                    let askUser = confirm("Do you want to add this product")

                                    if(askUser == true) {

                                        $("#p_text").html(data);

                                        document.getElementById("cart_num'.$id.'").value = " ";

                                        window.location.href = "user.php";
                                    }

                                }

                            });

                            

                            
                        })

                        
                        </script>
                    </div>
                </div>
            </div>
        ';


    };

    echo '

            <div class="col-md-6" style="margin-bottom: 20px; margin-top: 20px;">
                <!-- gives it the card feeling -->
                <div class="card">
                   <div class="card-header">
                   <h2>CART</h2>
                   </div>
                    <div class="card-body">
                        <div class="class-text" id="p_text"></div>

                        
                        <script>

                        
                        // for windows on load
                        window.addEventListener("load", function() {

                            let cart_name = document.getElementById("cart_name").value;

                            let cart_email = document.getElementById("cart_email").value;


                            console.log(cart_name);
                            console.log(cart_email);


                            $.ajax({
                                url: "functions/look.php", // containers our query logic
                                method: "POST",
                                data : {
                                    checkName: cart_name,
                                    checkEmail: cart_email
                                },
                                success: function(data) {

                                document.getElementById("p_text").innerHTML = data;


                                }

                            });
                            
                        })
                        </script>
                    </div>
                    <a href="placeOrder.php" target="_blank" id="look">Place Order</a>


                ';

                if(!isset($_SESSION['button'])) {
                    // do noting
                } else {

                    for($l = 1; $l <= count($_SESSION['button']); $l++) {

                        echo '
    
                        <script>
    
    
                        function money'.$_SESSION["button"]["but".$l].'() {
    
                            let cart_name = document.getElementById("cart_name").value;
    
                            let cart_email = document.getElementById("cart_email").value;
    
    
                            $.ajax({
                                url: "delete.php", // containers our query logic
                                method: "POST",
                                data : {
                                    query: '.$_SESSION["button"]["but".$l].',
                                    name: cart_name,
                                    email: cart_email
                                },
                                success: function(data) {
    
                                document.getElementById("p_text").innerHTML = data;

                                
    
    
                                }
    
                            });
    
                        }
    
                        
                        
                        </script>
                        
                        ';
                    }

                }
                
            
                

    echo '
    
                </div>
            </div>
            

            </div>
        </div>
     </div>

     <br>
    ';

}


?>

