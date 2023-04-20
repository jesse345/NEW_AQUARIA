<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/accountdetails.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/layout.css">
    <script src="../assets/js/jquery.min.js"></script>
    <title>Document</title>
</head>

<?php

include_once '../Model/db.php';
session_start();
if (isset($_SESSION['id'])) {
    $address = getAddress();
}
?>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3 border-0">
                    <h2 id="heading">Sign Up Your User Account</h2>
                    <p>Complete all the step to use E-Aquaria</p>
                    <form id="msform" action="../Controller/UsersController.php" method="POST">

                        <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">General Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1 - 3</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">First Name: *</label>
                                <input type="text" name="first_name" placeholder="First Name" onkeypress="return isNotNumber(event)" required />

                                <label class="fieldlabels">Last Name: *</label>
                                <input type="text" name="last_name" placeholder="Last Name" onkeypress="return isNotNumber(event)" required />

                                <label class="fieldlabels">Middle Initial: </label>
                                <input type="text" name="mi" placeholder="Middle Initial (leave blank if none)" onkeypress="return isNotNumber(event)" maxlength="1" />

                            </div> <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Contact Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 3</h2>
                                    </div>
                                </div>

                                <label class="fieldlabels">Contact No.: *</label>
                                <input type="text" name="contact_number" placeholder="Contact No." required />
                                <label class="fieldlabels">Address: *</label>
                                <select name="address">
                                    <?php while ($row = mysqli_fetch_assoc($address)) { ?>
                                        <option value="<?php echo $row['id'] ?>"> <?php echo $row['address'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div> <input type="button" name="next" class="next action-button" value="Next" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Gcash Account:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 3</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">Gcash Number.: *</label>
                                <input type="text" name="gcash_number" placeholder="Gcash Number" required />
                                <label class="fieldlabels">Gcash Name: *</label>
                                <input type="text" name="gcash_name" placeholder="Gcash Name" onkeypress="return isNotNumber(event)" required />
                            </div> <input type="submit" name="submitAccountForm" class="next action-button" value="Submit" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../JS/accountDetails.js"></script>
    <script>
        function isNotNumber(event) {
            // get the code of the pressed key
            var charCode = (event.which) ? event.which : event.keyCode;
            // if the pressed key is a number, prevent it from being entered
            if (charCode >= 48 && charCode <= 57) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
    <style>
        #msform input.invalid {
            border: solid red 1px;
        }
    </style>
</body>

</html>