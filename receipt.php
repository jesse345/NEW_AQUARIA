<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <?php include("../Layouts/Layout-head.php") ?>
    <link rel="stylesheet" href="../css/bootstrap-invoice.min.css" />
</head>

<body>
    <div class="container-fluid  mt-5">
        <div class="d-flex flex-column ">
            <div class="d-inline-flex">
                <p class="m-0"><a href="../">Home</a></p>
                <p class="m-0 px-2">></p>
                <p class="m-0">Receipt</p>
            </div>
        </div>
    </div>
    <!-- Start your project here-->

    <?php
    include("../Model/db.php");
    $order = mysqli_fetch_assoc(getUserOrders('orders', 'id', $_GET['order_id']));
    $user = mysqli_fetch_assoc(getUser('user_details', 'user_id', $order['user_id']));
    $payment = mysqli_fetch_assoc(getPayment($order['id']));
    $product = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $order['product_id']));
    $cart = mysqli_fetch_assoc(getCart('carts', 'product_id', $product['product_id'], "Yes"));

    if ($payment) {
    ?>
        <div class="card">
            <div class="card-body mx-4">
                <div class="container">
                    <p class="my-5 mx-5" style="font-size: 30px;">E-AQUARIA Receipt</p>
                    <div class="row">
                        <ul class="list-unstyled">
                            <li class="text-black">
                                <?php echo ucfirst($user['first_name']) . " " . ucfirst($user['last_name']) ?>
                            </li>
                            <li class="text-muted mt-1"><span class="text-black">Payment Type: </span>
                                <?php echo $payment['typeofpayment'] ?>
                            </li>
                            <li class="text-black mt-1">
                                <?php echo $payment['date_created'] ?>
                            </li>
                        </ul>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col-xl-10">
                            <p>
                                <?php echo $product['product_name']; ?>
                                (Qty:
                                <?php echo $cart['quantity']; ?>
                                )
                            </p>
                        </div>
                        <div class="col-xl-2">
                            <p class="float-end">₱
                                <?php echo $cart['total'] ?>
                            </p>
                        </div>
                        <hr style="border: 2px solid black;">
                    </div>
                    <div class="row text-black">

                        <div class="col-xl-12">
                            <p class="float-end fw-bold">Total:₱

                                <?php echo $cart['total'] ?>
                            </p>
                        </div>
                        <hr style="border: 2px solid black;">
                    </div>
                    <!-- <div class="text-center" style="margin-top: 90px;">
                    <a><u class="text-info">View in browser</u></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                </div> -->

                </div>
            </div>
        </div>
        <!-- End your project here-->
    <?php } else {
        echo "The buyer didn't pay yet!";
    } ?>

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>