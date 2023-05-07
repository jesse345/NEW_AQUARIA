<!DOCTYPE html>
<html lang="en">

<head>
    <title>Choose Payment</title>
    <link rel="stylesheet" href="../css/choosepayment.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>

    <?php
    include("../Model/db.php");
    $orders = mysqli_fetch_assoc(getUserOrders('orders', 'id', $_GET['order_id']));
    $cart = mysqli_fetch_assoc(
        usersCart(
            'carts',
            array('user_id', 'product_id'),
            array($orders['user_id'], $orders['product_id'])
        )
    );

    ?>
    <div class="container mt-5">
        <div class="d-flex flex-column ">
            <div class="d-inline-flex">
                <p class="m-0"><a href="../">Home</a></p>
                <p class="m-0 px-2">></p>
                <p class="m-0"><a href="../Pages/cart.php">Cart</a></p>
                <p class="m-0 px-2">></p>
                <p class="m-0"><a href="../Pages/checkout.php">Checkout</a></p>
                <p class="m-0 px-2">></p>
                <p class="m-0">Payment</p>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="member-title">Choose Payment</h2>
        <div class="row">
            <!--gcash-->
            <div class="col-lg-4 mb-lg-0 mb-3">
                <a class="payment-item" data-bs-toggle="modal" data-bs-target="#modal-gcash">
                    <div class="card p-3">
                        <div class="img-box">
                            <img src="https://mcdn.pybydl.com/lco/assets/payment/logo/gcash-353da48c3e4788d6e671a2aa05f783ea08cb6f8547713212ca7d6daf636e959c.svg"
                                alt="">
                        </div>
                        <div class="number">
                            <label class="fw-bold" for="">0955 6346 3151</label>
                        </div>
                        <small><span class="fw-bold">Name:</span><span>Bounty Hunter</span></small>
                    </div>
                </a>
            </div>
            <!--paypal-->
            <div class="col-lg-4 mb-lg-0 mb-3">
                <a class="payment-item" data-bs-toggle="modal" data-bs-target="#modal-paypal">
                    <div class="card p-3">
                        <div class="img-box">
                            <img src="https://downloadr2.apkmirror.com/wp-content/uploads/2023/03/68/64011ef3ca239.png"
                                alt="">
                        </div>
                        <div class="number">
                            <label class="fw-bold" for="">0955 6346 3151</label>
                        </div>
                        <small><span class="fw-bold">Name:</span><span>Centaur Warrunner</span></small>
                    </div>
                </a>
            </div>
            <!--grabpay-->
            <div class="col-lg-4 mb-lg-0 mb-3">
                <a class="payment-item" data-bs-toggle="modal" data-bs-target="#modal-grabpay">
                    <div class="card p-3">
                        <div class="img-box">
                            <img src="https://mcdn.pybydl.com/lco/assets/payment/logo/grabpay-f5a772c39482dc8d1e9d19dcf5c62a14033cab888ba198499ea6a1e8b90d1f48.svg"
                                alt="">
                        </div>
                        <div class="number">
                            <label class="fw-bold" for="">0955 6346 3151</label>
                        </div>
                        <small><span class="fw-bold">Name:</span><span>Dragon Knight</span></small>
                    </div>
                </a>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modal-gcash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gcash Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../Controller/PaymentController.php?order_id=<?php echo $orders['id'] ?>"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="d-block">
                            <div>
                                <!--src="..img/gcash-qrcode.png"-->
                                <img src="https://mcdn.pybydl.com/lco/assets/payment/logo/gcash-353da48c3e4788d6e671a2aa05f783ea08cb6f8547713212ca7d6daf636e959c.svg"
                                    class="mx-auto d-block" style="width:50%;height:150px;" alt="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Account Name</label>
                                <input type="text" class="form-control" value="Bounty Hunter" style="width: 100%;"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Account Number</label>
                                <input type="text" class="form-control" value="0955 6346 3151" style="width: 100%;"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Amount</label>
                                <input type="text" class="form-control" name="amount" id="amount" style="width: 100%;"
                                    value="<?php echo '₱ ' . $cart['total'] ?>" disabled>
                                <input type="number" class="form-control" name="amount" id="amount" style="width: 100%;"
                                    value="<?php echo $cart['total'] ?>" hidden>
                                <input type="hidden" id="payment-gcash" name="payment-gcash" value="Gcash">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Reference No</label>
                                <input type="number" class="form-control" name="reference-no" id="reference-no"
                                    placeholder="Enter Reference No" style="width: 100%;" maxlength="15">
                            </div>
                            <label class="form-label">Upload Receipt</label>
                            <input class="form-control" type="file" name="receipt-img" id="receipt-img" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="pay" id="pay">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--PAYPAL MODAL-->
    <div class="modal fade" id="modal-paypal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Paypal Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../Controller/PaymentController.php?order_id=<?php echo $orders['id'] ?>"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="d-block">
                            <div>
                                
                                <img src="https://downloadr2.apkmirror.com/wp-content/uploads/2023/03/68/64011ef3ca239.png"
                                    class="mx-auto d-block" style="width:50%;height:150px;" alt="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Account Name</label>
                                <input type="text" class="form-control" value="Centaur Warrunner" style="width: 100%;"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Account Number</label>
                                <input type="text" class="form-control" value="0955 6346 3151" style="width: 100%;"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Amount</label>
                                <input type="text" class="form-control" style="width: 100%;"
                                    value="<?php echo '₱ ' . $cart['total'] ?>" disabled>

                                <input type="text" class="form-control" name="amount" id="amount" style="width: 100%;"
                                    value="<?php echo $cart['total'] ?>" hidden>
                                <input type="hidden" id="payment-gcash" name="payment-gcash" value="Paypal">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Reference No</label>
                                <input type="number" class="form-control" name="reference-no" id="reference-no" placeholder="Enter Reference No" style="width: 100%;">
                            </div>
                            <label class="form-label">Upload Receipt</label>
                            <input class="form-control" type="file" name="receipt-img" id="receipt-img" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="pay" id="pay">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--GRAB PAY MODAL-->
    <div class="modal fade" id="modal-grabpay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Grab Pay Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../Controller/PaymentController.php?order_id=<?php echo $orders['id'] ?>"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="d-block">
                            <div>
                                <!--src="..img/gcash-qrcode.png"-->
                                <img src="https://mcdn.pybydl.com/lco/assets/payment/logo/grabpay-f5a772c39482dc8d1e9d19dcf5c62a14033cab888ba198499ea6a1e8b90d1f48.svg"
                                    class="mx-auto d-block" style="width:50%;height:150px;" alt="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Account Name</label>
                                <input type="text" class="form-control" value="Dragon Knight" style="width: 100%;"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Account Number</label>
                                <input type="text" class="form-control" value="0955 6346 3151" style="width: 100%;"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Amount</label>
                                <input type="text" class="form-control" name="amount" id="amount" style="width: 100%;"
                                    value="<?php echo '₱ ' . $cart['total'] ?>" disabled>
                                <input type="number" class="form-control" name="amount" id="amount" style="width: 100%;"
                                    value="<?php echo $cart['total'] ?>" hidden>
                                <input type="hidden" id="payment-gcash" name="payment-gcash" value="GrabPay">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Reference No</label>
                                <input type="number" class="form-control" name="reference-no" id="reference-no"
                                    placeholder="Enter Reference No" style="width: 100%;" maxlength="15">
                            </div>
                            <label class="form-label">Upload Receipt</label>
                            <input class="form-control" type="file" name="receipt-img" id="receipt-img" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="pay" id="pay">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>