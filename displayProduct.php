<?php

require "database/connect.php";

$product_query = "SELECT * FROM `product`";

$product_result = mysqli_query($conn, $product_query);

if($product_result) {

    echo '

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
                        <a href="#" class="btn btn-primary" id="funny'.$id.'">Add To Cart</a>

                        <script>
                        document.getElementById("funny'.$id.'").addEventListener("click", function(e) {
                            
                            e.preventDefault();
                            
                            alert("You Must Login to be able to Place Order. You can also our Whatsapp line to order now. Thanks")
                        })
                        </script>
                    </div>
                </div>
            </div>
        ';


    };

    echo '
            </div>
        </div>
     </div>

     <br>
    ';

}

?>