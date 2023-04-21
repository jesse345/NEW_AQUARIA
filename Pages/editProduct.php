<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../Layouts/head.layout.php") ?>
    <link rel="stylesheet" href="../css/addProduct.css">
</head>

<body>


    <div class="page-wrapper-layout">

        <?php include("../Layouts/header.layout.php") ?>

        <main class="main">

            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Edit Product</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item "><a href="manageProducts.php">Manage My Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content-layout">

                <div class="container px-1 py-5 mx-auto">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-11 col-lg-12 col-md-9 col-12 text-center">
                            <h3>Edit Product </h3>
                            <div class="card border-0">
                                <?php
                                $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $_GET['product_id']));
                                ?>

                                <?php if ($prod_det['category'] == "Aquarium") { ?>
                                    <form id="form1" class="form-card" action="../Controller/ProductsController.php?product_id=<?php echo $_GET['product_id'] ?>" method="POST" enctype="multipart/form-data">
                                        <h5 class="text-center mb-4">Fill-up all Fields</h5>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Category<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" id="category" name="category" value="Aquarium" disabled>
                                                <input type="hidden" id="category" name="category" value="Aquarium">
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product name<span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $prod_det['product_name'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Tank Type<span class="text-danger"> *</span>
                                                </label>
                                                <select name="tank_type" id="">
                                                    <option value="Betta Tank" <?php if ($prod_det['tank_type'] == "Betta Tank") { ?>selected <?php } ?>>Betta Tank</option>
                                                    <option value="Nanno Tank" <?php if ($prod_det['tank_type'] == "Nanno Tank") { ?>selected <?php } ?>>Nanno Tank</option>
                                                    <option value="Viewing Tank" <?php if ($prod_det['tank_type'] == "Viewing Tank") { ?>selected <?php } ?>>Viewing Tank</option>
                                                    <option value="Aquascaping Tank" <?php if ($prod_det['tank_type'] == "Aquascaping Tank") { ?>selected <?php } ?>>Aquascaping Tank</option>
                                                    <option value="Monster Tank" <?php if ($prod_det['tank_type'] == "Monster Tank") { ?>selected <?php } ?>>Monster Tank</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Tank Dimension<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" id="dimension" name="dimension" placeholder="Enter Tank dimension W x H" value="<?php echo $prod_det['dimension'] ?>" required>
                                            </div>

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Tank Thickness of Glass</label>
                                                <input type="text" id="thickness" name="thickness" placeholder="Enter Tank Thickness of Glass" value="<?php echo $prod_det['thickness'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                        *</span></label>
                                                <input type="number" id="price" name="price" placeholder="Enter Price" value="<?php echo $prod_det['price'] ?>" step="0.01" required>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                                </label>
                                                <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" value="<?php echo $prod_det['quantity'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                        *</span></label>

                                                <?php $images = mysqli_fetch_all(getProduct('product_images', 'product_id', $_GET['product_id']));

                                                ?>

                                                <div class="form">
                                                    <div class="grid">
                                                        <div class="form-element">
                                                            <input type="file" id="file-1" name="image[]" accept="image/*" value="<?php echo $images[0][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[0][0]; ?>">
                                                            <label for="file-1" id="file-1-preview">
                                                                <img src="<?php echo $images[0][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="form-element">
                                                            <input type="file" id="file-2" name="image[]" accept="image/*" value="<?php echo $images[1][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[1][0]; ?>">
                                                            <label for="file-2" id="file-2-preview">
                                                                <img src="<?php echo $images[1][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>

                                                        <div class="form-element">
                                                            <input type="file" id="file-3" name="image[]" accept="image/*" value="<?php echo $images[2][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[2][0]; ?>">
                                                            <label for="file-3" id="file-3-preview">
                                                                <img src="<?php echo $images[2][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                        </div>


                                        <!-- <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Shipping Type<span class="text-danger">
                                                        *</span></label>
                                                <select name="shipping_type" id="" required>
                                                    <option value="" disabled selected hidden>Select Shipping Type</option>
                                                    <option value="Pickup">Pickup</option>
                                                    <option value="Nanno Tank">Long rides</option>
                                                </select>
                                            </div>

                                        </div> -->
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Description<span class="text-danger">
                                                        *</span></label>

                                                <textarea name="description" id="description" placeholder="Enter Description" required><?php echo $prod_det['description'] ?>
                                                </textarea>

                                            </div>
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="form-group col-sm-4">
                                                <button type="submit" name="editProduct" class="btn-block btn-primary">
                                                    Edit Product
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else if ($prod_det['category'] == "Fishes") { ?>

                                    <form id="form2" class="form-card" action="../Controller/ProductsController.php?product_id=<?php echo $_GET['product_id'] ?>" method="POST" enctype="multipart/form-data">
                                        <h5 class="text-center mb-4">Fill-up all Fields</h5>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Category<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" id="category" name="category" value="Fishes" disabled>
                                                <input type="hidden" id="category" name="category" value="Fishes">
                                            </div>

                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product name<span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $prod_det['product_name'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">
                                                    Fish Type<span class="text-danger"> *</span>
                                                </label>
                                                <select name="fish_type" id="" required>

                                                    <option value="Live Bearer" <?php if ($prod_det['fish_type'] == "Live Bearer") { ?> selected <?php } ?>>Live Bearer</option>
                                                    <option value="Egg Layer" <?php if ($prod_det['fish_type'] == "Egg Layer") { ?> selected <?php } ?>>Egg Layer</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">
                                                    Fish Classification<span class="text-danger"> *</span>
                                                </label>
                                                <select name="fish_class" id="" required>

                                                    <option value="Algae Eater" <?php if ($prod_det['fish_class'] == "Live Bearer") { ?> selected <?php } ?>>Algae Eater</option>
                                                    <option value="Monster Fish" <?php if ($prod_det['fish_class'] == "Monster Fish") { ?> selected <?php } ?>>Monster Fish</option>
                                                    <option value="Community Fish" <?php if ($prod_det['fish_class'] == "Community Fish") { ?> selected <?php } ?>>Community Fish</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Size<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" id="size" name="size" placeholder="Enter Size" value="<?php echo $prod_det['size'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Gender<span class="text-danger"> *</span>
                                                </label>
                                                <select name="gender" id="" required>

                                                    <option value="Male" <?php if ($prod_det['gender'] == "Male") { ?> selected <?php } ?>>Male</option>
                                                    <option value="Female" <?php if ($prod_det['gender'] == "Female") { ?> selected <?php } ?>>Female</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Months or Yrs old
                                                </label>
                                                <input type="text" id="age" name="age" placeholder="Enter Age" value="<?php echo $prod_det['age'] ?>">
                                            </div>


                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                                </label>
                                                <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" value="<?php echo $prod_det['quantity'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                        *</span></label>
                                                <input type="number" id="price" name="price" step="0.01" placeholder="Enter Price" value="<?php echo $prod_det['price'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                        *</span></label>
                                                <?php $images = mysqli_fetch_all(getProduct('product_images', 'product_id', $_GET['product_id']));

                                                ?>
                                                <div class="form">
                                                    <div class="grid">
                                                        <div class="form-element">
                                                            <input type="file" id="file-1" name="image[]" accept="image/*" value="<?php echo $images[0][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[0][0]; ?>">
                                                            <label for="file-1" id="file-1-preview">
                                                                <img src="<?php echo $images[0][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="form-element">
                                                            <input type="file" id="file-2" name="image[]" accept="image/*" value="<?php echo $images[1][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[1][0]; ?>">
                                                            <label for="file-2" id="file-2-preview">
                                                                <img src="<?php echo $images[1][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>

                                                        <div class="form-element">
                                                            <input type="file" id="file-3" name="image[]" accept="image/*" value="<?php echo $images[2][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[2][0]; ?>">
                                                            <label for="file-3" id="file-3-preview">
                                                                <img src="<?php echo $images[2][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Description<span class="text-danger">
                                                        *</span></label>

                                                <textarea name="description" id="description" placeholder="Enter Description" required><?php echo $prod_det['description'] ?></textarea>

                                            </div>
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="form-group col-sm-4">
                                                <button type="submit" name="editProduct" class="btn-block btn-primary">
                                                    Edit Product
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else if ($prod_det['category'] == "Equipment & Accessories") { ?>
                                    <form id="form3" class="form-card" action="../Controller/ProductsController.php?product_id=<?php echo $_GET['product_id'] ?>" method="POST" enctype="multipart/form-data">
                                        <h5 class="text-center mb-4">Fill-up all Fields</h5>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Category<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" id="category" name="category" value="Equipment & Accessories" disabled>

                                                <input type="hidden" id="category" name="category" value="Equipment & Accessories">

                                            </div>

                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product name<span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $prod_det['product_name'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Specification<span class="text-danger">
                                                        *</span>
                                                </label>
                                                <input type="text" id="specification" name="specification" placeholder="Enter product specification" value="<?php echo $prod_det['specification'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                        *</span></label>
                                                <input type="number" id="price" name="price" placeholder="Enter Price" step="0.01" value="<?php echo $prod_det['price'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                                </label>
                                                <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" value="<?php echo $prod_det['quantity'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                        *</span></label>
                                                <?php $images = mysqli_fetch_all(getProduct('product_images', 'product_id', $_GET['product_id']));

                                                ?>
                                                <div class="form">
                                                    <div class="grid">
                                                        <div class="form-element">
                                                            <input type="file" id="file-1" name="image[]" accept="image/*" value="<?php echo $images[0][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[0][0]; ?>">
                                                            <label for="file-1" id="file-1-preview">
                                                                <img src="<?php echo $images[0][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="form-element">
                                                            <input type="file" id="file-2" name="image[]" accept="image/*" value="<?php echo $images[1][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[1][0]; ?>">
                                                            <label for="file-2" id="file-2-preview">
                                                                <img src="<?php echo $images[1][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>

                                                        <div class="form-element">
                                                            <input type="file" id="file-3" name="image[]" accept="image/*" value="<?php echo $images[2][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[2][0]; ?>">
                                                            <label for="file-3" id="file-3-preview">
                                                                <img src="<?php echo $images[2][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Description<span class="text-danger">
                                                        *</span></label>

                                                <textarea name="description" id="description" placeholder="Enter Description" required><?php echo $prod_det['description'] ?></textarea>

                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="form-group col-sm-4">
                                                <button type="submit" name="editProduct" class="btn-block btn-primary">
                                                    Edit Product
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else if ($prod_det['category'] == "Probiotics") { ?>
                                    <form id="form4" class="form-card" action="../Controller/ProductsController.php?product_id=<?php echo $_GET['product_id'] ?>" method="POST" enctype="multipart/form-data">
                                        <h5 class="text-center mb-4">Fill-up all Fields</h5>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Category<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" id="category" name="category" value="Probiotics" disabled>
                                                <input type="hidden" id="category" name="category" value="Probiotics">

                                            </div>

                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product name<span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $prod_det['product_name'] ?>" required>
                                            </div>

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Expiration Date<span class="text-danger">
                                                        *</span>
                                                </label>
                                                <input type="date" id="expire" name="expire" value="<?php echo $prod_det['expire'] ?>" required>
                                            </div>


                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Benfits<span class="text-danger">
                                                        *</span></label>

                                                <textarea name="benefits" id="benefits" placeholder="Enter Product Benefits" required><?php echo $prod_det['benefits'] ?></textarea>

                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                        *</span></label>
                                                <input type="number" id="price" name="price" step="0.01" placeholder="Enter Price" value="<?php echo $prod_det['price'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                                </label>
                                                <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" value="<?php echo $prod_det['quantity'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                        *</span></label>
                                                <?php $images = mysqli_fetch_all(getProduct('product_images', 'product_id', $_GET['product_id']));

                                                ?>
                                                <div class="form">
                                                    <div class="grid">
                                                        <div class="form-element">
                                                            <input type="file" id="file-1" name="image[]" accept="image/*" value="<?php echo $images[0][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[0][0]; ?>">
                                                            <label for="file-1" id="file-1-preview">
                                                                <img src="<?php echo $images[0][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="form-element">
                                                            <input type="file" id="file-2" name="image[]" accept="image/*" value="<?php echo $images[1][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[1][0]; ?>">
                                                            <label for="file-2" id="file-2-preview">
                                                                <img src="<?php echo $images[1][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>

                                                        <div class="form-element">
                                                            <input type="file" id="file-3" name="image[]" accept="image/*" value="<?php echo $images[2][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[2][0]; ?>">
                                                            <label for="file-3" id="file-3-preview">
                                                                <img src="<?php echo $images[2][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Description<span class="text-danger">
                                                        *</span></label>

                                                <textarea name="description" id="description" placeholder="Enter Description" required><?php echo $prod_det['price'] ?></textarea>

                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="form-group col-sm-4">
                                                <button type="submit" name="editProduct" class="btn-block btn-primary">
                                                    Edit Product
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else if ($prod_det['category'] == "Vitamins") { ?>
                                    <form id="form5" class="form-card" action="../Controller/ProductsController.php?product_id=<?php echo $_GET['product_id'] ?>" method="POST" enctype="multipart/form-data">
                                        <h5 class="text-center mb-4">Fill-up all Fields</h5>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Category<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" id="category" name="category" value="Vitamins" disabled>
                                                <input type="hidden" id="category" name="category" value="Vitamins">

                                            </div>

                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product name<span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $prod_det['product_name'] ?>" required>
                                            </div>

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Expiration Date<span class="text-danger">
                                                        *</span>
                                                </label>
                                                <input type="date" id="expire" name="expire" value="<?php echo $prod_det['expire'] ?>" required>
                                            </div>


                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Benfits<span class="text-danger">
                                                        *</span></label>

                                                <textarea name="benefits" id="description" placeholder="Enter Product Benefits" required><?php echo $prod_det['benefits'] ?></textarea>

                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                        *</span></label>
                                                <input type="number" id="price" name="price" placeholder="Enter Price" value="<?php echo $prod_det['price'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                                </label>
                                                <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" value="<?php echo $prod_det['quantity'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                        *</span></label>
                                                <?php $images = mysqli_fetch_all(getProduct('product_images', 'product_id', $_GET['product_id']));

                                                ?>
                                                <div class="form">
                                                    <div class="grid">
                                                        <div class="form-element">
                                                            <input type="file" id="file-1" name="image[]" accept="image/*" value="<?php echo $images[0][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[0][0]; ?>">
                                                            <label for="file-1" id="file-1-preview">
                                                                <img src="<?php echo $images[0][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="form-element">
                                                            <input type="file" id="file-2" name="image[]" accept="image/*" value="<?php echo $images[1][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[1][0]; ?>">
                                                            <label for="file-2" id="file-2-preview">
                                                                <img src="<?php echo $images[1][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>

                                                        <div class="form-element">
                                                            <input type="file" id="file-3" name="image[]" accept="image/*" value="<?php echo $images[2][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[2][0]; ?>">
                                                            <label for="file-3" id="file-3-preview">
                                                                <img src="<?php echo $images[2][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Description<span class="text-danger">
                                                        *</span></label>

                                                <textarea name="description" id="description" placeholder="Enter Description" required><?php echo $prod_det['price'] ?></textarea>

                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="form-group col-sm-4">
                                                <button type="submit" name="editProduct" class="btn-block btn-primary">
                                                    Edit Product
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else if ($prod_det['category'] == "Color Enhancer") { ?>
                                    <form id="form6" class="form-card" action="../Controller/ProductsController.php?product_id=<?php echo $_GET['product_id'] ?>" method="POST" enctype="multipart/form-data">
                                        <h5 class="text-center mb-4">Fill-up all Fields</h5>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Category<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" id="category" name="category" value="Color Enhancer" disabled>
                                                <input type="hidden" id="category" name="category" value="Color Enhancer">

                                            </div>

                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product name<span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $prod_det['product_name'] ?>" required>
                                            </div>

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Expiration Date<span class="text-danger">
                                                        *</span>
                                                </label>
                                                <input type="date" id="expire" name="expire" value="<?php echo $prod_det['expire'] ?>" required>
                                            </div>


                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Benfits<span class="text-danger">
                                                        *</span></label>

                                                <textarea name="benefits" id="benefits" placeholder="Enter Product Benefits" value="<?php echo $prod_det['benefits'] ?>" required></textarea>

                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                        *</span></label>
                                                <input type="number" id="price" name="price" placeholder="Enter Price" step="0.01" value="<?php echo $prod_det['price'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                                </label>
                                                <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" value="<?php echo $prod_det['quantity'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                        *</span></label>
                                                <?php $images = mysqli_fetch_all(getProduct('product_images', 'product_id', $_GET['product_id']));

                                                ?>
                                                <div class="form">
                                                    <div class="grid">
                                                        <div class="form-element">
                                                            <input type="file" id="file-1" name="image[]" accept="image/*" value="<?php echo $images[0][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[0][0]; ?>">
                                                            <label for="file-1" id="file-1-preview">
                                                                <img src="<?php echo $images[0][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="form-element">
                                                            <input type="file" id="file-2" name="image[]" accept="image/*" value="<?php echo $images[1][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[1][0]; ?>">
                                                            <label for="file-2" id="file-2-preview">
                                                                <img src="<?php echo $images[1][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>

                                                        <div class="form-element">
                                                            <input type="file" id="file-3" name="image[]" accept="image/*" value="<?php echo $images[2][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[2][0]; ?>">
                                                            <label for="file-3" id="file-3-preview">
                                                                <img src="<?php echo $images[2][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Description<span class="text-danger">
                                                        *</span></label>

                                                <textarea name="description" id="description" placeholder="Enter Description" required><?php echo $prod_det['price'] ?></textarea>

                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="form-group col-sm-4">
                                                <button type="submit" name="editProduct" class="btn-block btn-primary">
                                                    Edit Product
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else if ($prod_det['category'] == "Medications") { ?>
                                    <form id="form7" class="form-card" action="../Controller/ProductsController.php?product_id=<?php echo $_GET['product_id'] ?>" method="POST" enctype="multipart/form-data">
                                        <h5 class="text-center mb-4">Fill-up all Fields</h5>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Category<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" id="category" name="category" value="Medications" disabled>
                                                <input type="hidden" id="category" name="category" value="Medications">

                                            </div>

                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product name<span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $prod_det['product_name'] ?>" required>
                                            </div>

                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Expiration Date<span class="text-danger">
                                                        *</span>
                                                </label>
                                                <input type="date" id="expire" name="expire" value="<?php echo $prod_det['expire'] ?>" required>
                                            </div>


                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Benfits<span class="text-danger">
                                                        *</span></label>

                                                <textarea name="benefits" id="benefits" placeholder="Enter Product Benefits" required><?php echo $prod_det['price'] ?></textarea>

                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                        *</span></label>
                                                <input type="number" id="price" name="price" placeholder="Enter Price" value="<?php echo $prod_det['price'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                                </label>
                                                <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" value="<?php echo $prod_det['quantity'] ?>" required>
                                            </div>
                                        </div>


                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                        *</span></label>
                                                <?php $images = mysqli_fetch_all(getProduct('product_images', 'product_id', $_GET['product_id']));

                                                ?>
                                                <div class="form">
                                                    <div class="grid">
                                                        <div class="form-element">
                                                            <input type="file" id="file-1" name="image[]" accept="image/*" value="<?php echo $images[0][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[0][0]; ?>">
                                                            <label for="file-1" id="file-1-preview">
                                                                <img src="<?php echo $images[0][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="form-element">
                                                            <input type="file" id="file-2" name="image[]" accept="image/*" value="<?php echo $images[1][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[1][0]; ?>">
                                                            <label for="file-2" id="file-2-preview">
                                                                <img src="<?php echo $images[1][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>

                                                        <div class="form-element">
                                                            <input type="file" id="file-3" name="image[]" accept="image/*" value="<?php echo $images[2][2]; ?>">
                                                            <input type="hidden" name="img_id[]" value="<?php echo $images[2][0]; ?>">
                                                            <label for="file-3" id="file-3-preview">
                                                                <img src="<?php echo $images[2][2]; ?>" alt="">
                                                                <div>
                                                                    <span>+</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-12 flex-column d-flex">
                                                <label class="form-control-label px-3">Description<span class="text-danger">
                                                        *</span></label>

                                                <textarea name="description" id="description" placeholder="Enter Description" required><?php echo $prod_det['price'] ?></textarea>

                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="form-group col-sm-4">
                                                <button type="submit" name="editProduct" class="btn-block btn-primary">
                                                    Edit Product
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                                <div class="row justify-content-end">
                                    <div class="form-group col-sm-2">
                                        <button class="btn-block btn-primary hidden" id="next-button" disabled>
                                            Ok
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <?php include("../Layouts/footer.layout.php"); ?>
    </div>

    <?php
    include("../Layouts/mobileMenu.layout.php");
    include("../Layouts/scripts.layout.php");

    ?>
    <script src="../JS/editProduct.js"> </script>





</body>

</html>