<?php

//To insert product
function insertProduct($table_name, $fields, $values, $table_name1, $fields1, $values1)
{
    global $conn;
    connect();
    //for products table
    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);
    //for products_details table
    $flds1 = implode("`,`", $fields1);
    $vals1 = implode("','", $values1);

    $query = mysqli_query($conn, "INSERT INTO `$table_name` (`$flds`) VALUES ('$vals') ");
    $query2 = mysqli_query($conn, "INSERT INTO `$table_name1` (`$flds1`) VALUES((SELECT LAST_INSERT_ID()),'$vals1')");
    return $query;
    disconnect();
}


function getAllProds($table_name, $user_id)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table_name` WHERE `isDelete` = 'No' AND user_id= $user_id";
    $data = mysqli_query($conn, $query);

    disconnect();
    return $data;
}

//To get all the product
//Not deleted
function getAllProduct($table_name)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table_name` WHERE `isDelete` = 'No'";
    $data = mysqli_query($conn, $query);

    disconnect();
    return $data;
}


//To get all the product
function getAllUsersProduct($table_name, $fld, $val)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table_name` WHERE `isDelete` = 'No' AND `$fld` = $val";
    $data = mysqli_query($conn, $query);

    disconnect();
    return $data;
}

function getProductByCategory($category)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `product_details` WHERE `category` = '$category' ";
    $data = mysqli_query($conn, $query);

    disconnect();
    return $data;
}

//To get all product but limit to specific number
//for pagination
function getAllProductLimit($table_name, $page, $result)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table_name` LIMIT $page,$result";
    $data = mysqli_query($conn, $query);

    disconnect();
    return $data;
}




//Get single product
//Get own products
function getProduct($table_name, $fields, $values)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table_name` WHERE `$fields` = $values ";
    $data = mysqli_query($conn, $query);
    disconnect();
    return $data;
}


function searchProduct($search)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `product_details` WHERE `product_name` LIKE '%$search%'";
    $data = mysqli_query($conn, $query);
    disconnect();
    return $data;
}



function deleteProduct($product_id)
{
    global $conn;
    connect();
    $query = "UPDATE `products` SET `isDelete` = 'Yes' WHERE `id` = $product_id";
    $data = mysqli_query($conn, $query);
    disconnect();
}


function editProduct($table_name, $fields, $values)
{
    global $conn;
    connect();
    for ($i = 1; $i < count($fields); $i++) {
        $query = "UPDATE $table_name SET `$fields[$i]` = '$values[$i]' WHERE `$fields[0]` = $values[0]";
        $data = mysqli_query($conn, $query);
    }
    disconnect();
}


function insertProductImage($table_name, $fields, $values)
{
    global $conn;
    connect();
    //for products table
    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);
    $query = mysqli_query($conn, "INSERT INTO `$table_name` (`$flds`) VALUES ('$vals') ");
    disconnect();
}
