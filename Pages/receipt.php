<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../Includes/head.inc.php");

    include_once '../Model/db.php';
    session_start();

    if (isset($_SESSION['id'])) {
        $user = mysqli_fetch_assoc(getUser('user_details', 'user_id', $_SESSION['id']));
    }

    $order = mysqli_fetch_assoc(getUserOrders('orders', 'id', $_GET['order_id']));
    $user = mysqli_fetch_assoc(getUser('user_details', 'user_id', $order['user_id']));
    $payment = mysqli_fetch_assoc(getPayment($order['id']));
    $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $order['product_id']));
    $cart = mysqli_fetch_assoc(getCart('carts', 'product_id', $prod_det['product_id'], "Yes"));
    ?>
</head>

<body>
    <div class="page-wrapper">
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="manageOrders.php">Back</a></li>


                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="page-content">
                <div class="checkout">
                    <div class="container w-50 mt-5">
                        <div class="my-auto">
                            <div class=" summary" id="table-summary">
                                <h3 class="summary-title">E-AQUARIA Receipt</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><a href="#"><?php echo $prod_det['product_name'] ?></a></td>

                                            <td><?php echo number_format($cart['quantity']) ?></td>
                                            <td>₱ <?php echo number_format($cart['total'], 2) ?></td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td></td>
                                            <td>₱ <?php echo number_format($cart['total'], 2) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" onclick="downloadImage()">
                            <span class="btn-text">Download Receipt</span>
                            <span class="btn-hover-text">Download Receipt</span>
                        </button>


                    </div>
                </div>
            </div>

        </main>

    </div>
</body>


<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
    function downloadImage() {
        html2canvas(document.querySelector(".my-auto")).then(function(canvas) {
            var link = document.createElement("a");
            document.body.appendChild(link);
            link.download = "myDiv.png";
            link.href = canvas.toDataURL();
            link.target = '_blank';
            link.click();
        });
    }
</script>

<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->

</html>