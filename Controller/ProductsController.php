<?php
include '../Model/db.php';
session_start();
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i:s');
if (!empty($_SESSION['id'])) {

    if (isset($_POST['addProduct'])) {
        $user_id = $_SESSION['id'];
        $gname = $_POST['gname'];
        $num = $_POST['gnumber'];

        echo $user_id . $gname . $num;

        $isSubscribe = getUserSubscription($_SESSION['id']);
        if (mysqli_num_rows($isSubscribe) > 0) {
            $sub = mysqli_fetch_assoc($isSubscribe);
            if ($sub['subscription_type'] != 3) {
                decrement($sub['subscription_id'], $sub['number_of_products'] - 1);
            }
        }

        editUser(
            'user_details',
            array('user_id', 'gcash_number', 'gcash_name'),
            array($user_id, $num, $gname)
        );

        // Temporary only
        $targetDir = "../img/"; // Set target directory
        $fileType = pathinfo($_FILES['image']['name'][0], PATHINFO_EXTENSION);

        $img = $targetDir . basename($_FILES['image']['name'][0]);

        $product_name = $_POST['product_name'];
        // $typeofpayment = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $ship = $_POST['shipping_type'];




        $user_fld = array('user_id', 'date_created', 'isDelete');
        $user_val = array($_SESSION['id'], $date, "No");

        $user_det_fld = array(
            "product_id",
            "product_name",
            "quantity",
            "description",
            "price",
            "product_img",
            "category",
            "shipping_type"
        );

        $user_det_val = array($product_name, $quantity, $description, $price, $img, $category,$ship);


        if ($category == "Aquarium") {
            $tank = $_POST['tank_type'];
            $dimension = $_POST['dimension'];
            $thick = $_POST['thickness'];

            array_push($user_det_fld, 'tank_type', 'dimension', 'thickness');
            array_push($user_det_val, $tank, $dimension, $thick);
            $add = insertProduct(
                'products',
                $user_fld,
                $user_val,
                "product_details",
                $user_det_fld,
                $user_det_val
            );


            echo "<script>
            alert('$product_name Added successfully!');
            window.location.href = '../Pages/manageProducts.php';
        </script>";
        } else if ($category == "Fishes") {
            $fish = $_POST['fish_type'];
            $class = $_POST['fish_class'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $size = $_POST['size'];
            array_push($user_det_fld, 'fish_type', 'fish_class', 'gender', 'age', 'size');
            array_push($user_det_val, $fish, $class, $gender, $age, $size);

            $add = insertProduct(
                'products',
                $user_fld,
                $user_val,
                "product_details",
                $user_det_fld,
                $user_det_val
            );
            echo "<script>
                alert('$product_name Added successfully!');
                window.location.href = '../Pages/manageProducts.php';
            </script>";
        } else if ($category == "Equipment & Accessories") {
            $spec = $_POST['specification'];

            array_push($user_det_fld, 'specification');
            array_push($user_det_val, $spec);

            $add = insertProduct(
                'products',
                $user_fld,
                $user_val,
                "product_details",
                $user_det_fld,
                $user_det_val
            );
            echo "<script>
                alert('$product_name Added successfully!');
                window.location.href = '../Pages/manageProducts.php';
            </script>";
        } else if (
            $category == "Probiotics" || $category == "Vitamins" || $category == "Color Enhancer" || $category == "Medications"
        ) {
            $exp = $_POST['expire'];
            $benefits = $_POST['benefits'];

            array_push($user_det_fld, 'expiration_date', 'benefits');
            array_push($user_det_val, $exp, $benefits);

            $add = insertProduct(
                'products',
                $user_fld,
                $user_val,
                "product_details",
                $user_det_fld,
                $user_det_val
            );
            echo "<script>
                alert('$product_name Added successfully!');
                window.location.href = '../Pages/manageProducts.php';
            </script>";
        }


        $id = mysqli_insert_id($conn);

        echo "Last id " . $id;
        $targetDir = "../img/"; // Set target directory
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        foreach ($_FILES['image']['name'] as $key => $name) {
            $fileType = pathinfo($_FILES['image']['name'][$key], PATHINFO_EXTENSION);
            $targetPath = $targetDir . basename($name);

            // Check if file type is allowed
            if (in_array($fileType, $allowedTypes)) {
                // Move uploaded file to target directory
                move_uploaded_file($_FILES['image']['tmp_name'][$key], $targetPath);
                insertProductImage('product_images', array('product_id', 'img'), array($id, $targetPath));
            } else {
                echo "Invalid file type: $name<br>";
            }
        }
    } else if (isset($_POST['deleteProduct'])) {
        $product_id = $_GET['product_id'];


        deleteProduct($product_id);
        echo "<script>
            alert('Deleted Successfully');
            window.location.href='../Pages/breedersblog.php';
        </script>";
        // header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    // For Search Product
    else if (isset($_GET['searchProduct'])) {
        $search = $_GET['search'];

        header("Location: ../Pages/product-lists.php?search=$search");
        // if ($search == null) {
        //     // header("location: ../");
        // } else {
        //     header("Location: ../Pages/products.php?search=$search");
        // }
    } else if (isset($_POST['editProduct'])) {

        // Temporary only
        // $targetDir = "../img/"; // Set target directory
        // $fileType = pathinfo($_FILES['image']['name'][0], PATHINFO_EXTENSION);
        // $img = $targetDir . basename($_FILES['image']['name'][0]);
        $product_name = $_POST['product_name'];
        // $typeofpayment = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        // $ship = $_POST['shipping_type'];

        $user_fld = array('user_id', 'date_created', 'isDelete');
        $user_val = array($_SESSION['id'], $date, "No");
        $user_det_fld = array(
            "product_id",
            "product_name",
            "quantity",
            "description",
            "price",
            // "product_img",
            "category",
            // "shipping_type"
        );
        $user_det_val = array(
            $_GET['product_id'],
            $product_name,
            $quantity,
            $description,
            $price,
            // $img,
            $category,
            // $ship
        );
        if ($category == "Aquarium") {
            $tank = $_POST['tank_type'];
            $dimension = $_POST['dimension'];
            $thick = $_POST['thickness'];


            array_push($user_det_fld, 'tank_type', 'dimension', 'thickness');
            array_push($user_det_val, $tank, $dimension, $thick);
            editProduct('product_details', $user_det_fld, $user_det_val);
        } else if ($category == "Fishes") {
            $fish = $_POST['fish_type'];
            $class = $_POST['fish_class'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $size = $_POST['size'];
            array_push($user_det_fld, 'fish_type', 'fish_class', 'gender', 'age', 'size');
            array_push($user_det_val, $fish, $class, $gender, $age, $size);
            editProduct('product_details', $user_det_fld, $user_det_val);
        } else if ($category == "Equipment & Accessories") {
            $spec = $_POST['specification'];

            array_push($user_det_fld, 'specification');
            array_push($user_det_val, $spec);
            editProduct('product_details', $user_det_fld, $user_det_val);
        } else if (
            $category == "Probiotics" || $category == "Vitamins" || $category == "Color Enhancer" || $category == "Medications"
        ) {
            $exp = $_POST['expire'];
            $benefits = $_POST['benefits'];

            array_push($user_det_fld, 'expiration_date', 'benefits');
            array_push($user_det_val, $exp, $benefits);

            editProduct('product_details', $user_det_fld, $user_det_val);
        }
        $targetDir = "../img/"; // Set target directory
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $img_id = $_POST['img_id'];
        $i = 0;
        $img = $targetDir . basename($_FILES['image']['name'][0]);
        if ($img != "../img/") {
            editProduct('product_details', array('product_id', 'product_img'), array($_GET['product_id'], $img));
        }
        foreach ($_FILES['image']['name'] as $key => $name) {
            $fileType = pathinfo($_FILES['image']['name'][$key], PATHINFO_EXTENSION);
            $targetPath = $targetDir . basename($name);

            if ($targetPath != "../img/") {

                // Check if file type is allowed
                if (in_array($fileType, $allowedTypes)) {
                    // Move uploaded file to target directory
                    move_uploaded_file($_FILES['image']['tmp_name'][$key], $targetPath);


                    editProduct('product_images', array('id', 'img'), array($img_id[$i], $targetPath));
                } else {
                    echo "Invalid file type: $name<br>";
                }
            }
            $i++;
        }
        echo "<script>
                alert('$product_name Added successfully!');
                window.location.href = '../Pages/manageProducts.php';
            </script>";
    } else {
        header("Location: ../");
    }
} else {
    header("location: ../");
}
