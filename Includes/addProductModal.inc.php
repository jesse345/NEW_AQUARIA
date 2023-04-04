<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 m-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container-fluid px-1 py-5 mx-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-11 col-lg-12 col-md-9 col-12 text-center">
                        <h3>Add Product </h3>
                        <div class="card">
                            <label class="text-left" id="label">
                                Category
                                <span class="text-danger">*</span>
                            </label>
                            <select name="category" id="form-selector" required>
                                <option value="" disabled selected hidden>Select Category..</option>
                                <option value="form1">Aquarium</option>
                                <option value="form2">Fishes</option>
                                <option value="form3">Equipment & Accessories</option>
                                <option value="form4">Probiotics</option>
                                <option value="form5">Vitamins</option>
                                <option value="form6">Color Enhancer</option>
                                <option value="form7">Medications</option>
                            </select>



                            <div class="row ">
                                <div class="col-sm-3">
                                    <button class="btn-block btn-primary hidden" id="back-button">
                                        Back
                                    </button>
                                </div>
                            </div>
                            <form id="form1" class="form-card hidden" action="../Controller/ProductsController.php" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Tank Type<span class="text-danger"> *</span>
                                        </label>
                                        <select name="tank_type" id="">
                                            <option value="" disabled selected hidden>Select Tank Type</option>
                                            <option value="Betta Tank">Betta Tank</option>
                                            <option value="Nanno Tank">Nanno Tank</option>
                                            <option value="Viewing Tank">Viewing Tank</option>
                                            <option value="Aquascaping Tank">Aquascaping Tank</option>
                                            <option value="Monster Tank">Monster Tank</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Tank Dimension<span class="text-danger">
                                                *</span></label>
                                        <input type="text" id="dimension" name="dimension" placeholder="Enter Tank dimension W x H" required>
                                    </div>

                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Tank Thickness of Glass</label>
                                        <input type="text" id="thickness" name="thickness" placeholder="Enter Tank Thickness of Glass" required>
                                    </div>
                                </div>

                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                *</span></label>
                                        <input type="number" id="price" name="price" placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                        </label>
                                        <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" required>
                                    </div>
                                </div>

                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                *</span></label>

                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>

                                    </div>
                                </div>

                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Shipping Type<span class="text-danger">
                                                *</span></label>
                                        <select name="shipping_type" id="" required>
                                            <option value="" disabled selected hidden>Select Shipping Type</option>
                                            <option value="Pickup">Pickup</option>
                                            <option value="Nanno Tank">Long rides</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Description<span class="text-danger">
                                                *</span></label>

                                        <textarea name="description" id="description" placeholder="Enter Description" required></textarea>

                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="form-group col-sm-4">
                                        <button type="submit" name="addProduct" class="btn-block btn-primary">
                                            Add Product
                                        </button>
                                    </div>
                                </div>
                            </form>



                            <form id="form2" class="hidden form-card" action="../Controller/ProductsController.php" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">
                                            Fish Type<span class="text-danger"> *</span>
                                        </label>
                                        <select name="fish_type" id="" required>
                                            <option value="" disabled selected hidden>Select Fish Type</option>
                                            <option value="Live Bearer">Live Bearer</option>
                                            <option value="Egg Layer">Egg Layer</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">
                                            Fish Classification<span class="text-danger"> *</span>
                                        </label>
                                        <select name="fish_class" id="" required>
                                            <option value="" disabled selected hidden>Select Fish Classification</option>
                                            <option value="Live Bearer">Algae Eater</option>
                                            <option value="Monster Fish">Monster Fish</option>
                                            <option value="Community Fish">Community Fish</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Size<span class="text-danger">
                                                *</span></label>
                                        <input type="text" id="size" name="size" placeholder="Enter Size" required>
                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Gender<span class="text-danger"> *</span>
                                        </label>
                                        <select name="gender" id="" required>
                                            <option value="" disabled selected hidden>Select Fish Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Months or Yrs old
                                        </label>
                                        <input type="text" id="age" name="age" placeholder="Enter Age">
                                    </div>


                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                        </label>
                                        <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" required>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                *</span></label>
                                        <input type="number" id="price" name="price" placeholder="Enter Price" required>
                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                *</span></label>

                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>

                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Description<span class="text-danger">
                                                *</span></label>

                                        <textarea name="description" id="description" placeholder="Enter Description" required></textarea>

                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="form-group col-sm-4">
                                        <button type="submit" name="addProduct" class="btn-block btn-primary">
                                            Add Product
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <form id="form3" class="hidden form-card" action="../Controller/ProductsController.php" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Specification<span class="text-danger">
                                                *</span>
                                        </label>
                                        <input type="text" id="specification" name="specification" placeholder="Enter product specification" required>
                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                *</span></label>
                                        <input type="number" id="price" name="price" placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                        </label>
                                        <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" required>
                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                *</span></label>

                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>

                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Description<span class="text-danger">
                                                *</span></label>

                                        <textarea name="description" id="description" placeholder="Enter Description" required></textarea>

                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="form-group col-sm-4">
                                        <button type="submit" name="addProduct" class="btn-block btn-primary">
                                            Add Product
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <form id="form4" class="hidden form-card" action="../Controller/ProductsController.php" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>
                                    </div>

                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Expiration Date<span class="text-danger">
                                                *</span>
                                        </label>
                                        <input type="date" id="expire" name="expire" required>
                                    </div>


                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Benfits<span class="text-danger">
                                                *</span></label>

                                        <textarea name="benefits" id="benefits" placeholder="Enter Product Benefits" required></textarea>

                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                *</span></label>
                                        <input type="number" id="price" name="price" placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                        </label>
                                        <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" required>
                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                *</span></label>

                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>

                                    </div>
                                </div>

                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Description<span class="text-danger">
                                                *</span></label>

                                        <textarea name="description" id="description" placeholder="Enter Description" required></textarea>

                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="form-group col-sm-4">
                                        <button type="submit" name="addProduct" class="btn-block btn-primary">
                                            Add Product
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <form id="form5" class="hidden form-card" action="../Controller/ProductsController.php" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>
                                    </div>

                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Expiration Date<span class="text-danger">
                                                *</span>
                                        </label>
                                        <input type="date" id="expire" name="expire" required>
                                    </div>


                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Benfits<span class="text-danger">
                                                *</span></label>

                                        <textarea name="benefits" id="description" placeholder="Enter Product Benefits" required></textarea>

                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                *</span></label>
                                        <input type="number" id="price" name="price" placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                        </label>
                                        <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" required>
                                    </div>
                                </div>

                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                *</span></label>

                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>

                                    </div>
                                </div>

                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Description<span class="text-danger">
                                                *</span></label>

                                        <textarea name="description" id="description" placeholder="Enter Description" required></textarea>

                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="form-group col-sm-4">
                                        <button type="submit" name="addProduct" class="btn-block btn-primary">
                                            Add Product
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <form id="form6" class="hidden form-card" action="../Controller/ProductsController.php" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>
                                    </div>

                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Expiration Date<span class="text-danger">
                                                *</span>
                                        </label>
                                        <input type="date" id="expire" name="expire" required>
                                    </div>


                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Benfits<span class="text-danger">
                                                *</span></label>

                                        <textarea name="benefits" id="benefits" placeholder="Enter Product Benefits" required></textarea>

                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                *</span></label>
                                        <input type="number" id="price" name="price" placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                        </label>
                                        <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" required>
                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                *</span></label>

                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>

                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Description<span class="text-danger">
                                                *</span></label>

                                        <textarea name="description" id="description" placeholder="Enter Description" required></textarea>

                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="form-group col-sm-4">
                                        <button type="submit" name="addProduct" class="btn-block btn-primary">
                                            Add Product
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <form id="form7" class="hidden form-card" action="../Controller/ProductsController.php" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>
                                    </div>

                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Expiration Date<span class="text-danger">
                                                *</span>
                                        </label>
                                        <input type="date" id="expire" name="expire" required>
                                    </div>


                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Benfits<span class="text-danger">
                                                *</span></label>

                                        <textarea name="benefits" id="benefits" placeholder="Enter Product Benefits" required></textarea>

                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Product Price<span class="text-danger">
                                                *</span></label>
                                        <input type="number" id="price" name="price" placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label class="form-control-label px-3">Quantity<span class="text-danger"> *</span>
                                        </label>
                                        <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" required>
                                    </div>
                                </div>

                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Upload Image (3 image needed)<span class="text-danger">
                                                *</span></label>

                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>
                                        <input type="file" name="image[]" accept="image/*" required>

                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Description<span class="text-danger">
                                                *</span></label>

                                        <textarea name="description" id="description" placeholder="Enter Description" required></textarea>

                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="form-group col-sm-4">
                                        <button type="submit" name="addProduct" class="btn-block btn-primary">
                                            Add Product
                                        </button>
                                    </div>
                                </div>
                            </form>

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
    </div>
</div>