<?php
include '../Model/db.php';
session_start();
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');
if (!empty($_SESSION['id'])) {
    if (isset($_POST['addProduct'])) {

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

        $user_det_val = array($product_name, $quantity, $description, $price, $img, $category, $ship);


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
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    // For Search Product
    else if (isset($_POST['searchProduct'])) {
        $search = $_POST['search'];
        if ($search == null) {
            // header("location: ../");
        } else {
            header("Location: ../Pages/products.php?search=$search");
        }
    } else if (isset($_POST['review'])) {
        $fld = array('user_id', 'product_id', 'rate', 'feedback', 'date_created');
        $val = array($_SESSION['id'], $_GET['id'], $_POST['rating'], $_POST['feedback'], $date);
        insertProductReviews('feedbacks', $fld, $val);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("Location: ../");
    }
} else {
    header("location: ../");
}
