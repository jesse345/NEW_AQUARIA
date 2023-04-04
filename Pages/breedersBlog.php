<?php
session_start();

include("../Model/db.php");
$allpost = getAllPost('breedersblog');

if(isset($_SESSION['id'])){
    $sessionid = $_SESSION['id'];
}else{
    $session_id = null;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Card</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> 
    <style>
        .dropdown-menu{transform: translate(0px, 18px)!important;}
    </style>
</head>
<body> 
<div class="container">
    <a class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#modal-addpost"><i class="fas fa-plus" style='font-size:15px'></i> Add Post</a>
</div>
    <div class="container mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">
            <?php
            while($post = mysqli_fetch_assoc($allpost)){
                $user = mysqli_fetch_assoc(getUser('user_details', 'user_id', $post['user_id']));
                
                ?>
                    <div class="col-md-8 mb-5">
                        <div class="card">
                            <div class="d-inline-flex justify-content-between p-2 px-3">
                                <div class="d-flex flex-row align-items-center"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="45" class="rounded-circle">
                                    <div class="d-flex flex-column ml-3"> <span class="font-weight-bold"><?php echo ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name'])?></span> <small class="text-primary"><?php echo $post['date_created']?></small> </div>
                                </div>
                                <div class="dropdown d-flex mt-1">
                                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h" style="color:black;"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin-top:-26px!important;">
                                        <li><a class="dropdown-item" data-bs-toggle="modal"data-bs-target="#report">Report</a></li>
                                    </ul>
                                </div>
                            </div> 
                            <div class="p-2">
                                <p class="text-justify"><?php echo $post['description']?></p>
                            </div>  
                            <img src="../img/<?php echo $post['image'] ?>" class="img-fluid" style="height:270px!important;">
                            <div class="borderless">
                                <ul class="list-group list-group-horizontal"> 
                                    <li class="list-group-item border-0"> <a href="../Pages/comment.php?breedersblog_id=<?php echo $post['id']?>" class="btn btn-outline-primary"><i href="#" class='fas fa-comment-alt'></i> Comment</a></li>
                                    <li class="list-group-item border-0"><button class="btn btn-outline-primary"><i href="#" class='fas fa-comment'></i> Chat</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            <?php } ?>  
        </div>
    </div>
    
<!--ADD MODAL-->
<div class="modal fade" id="modal-addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="../Controller/BreederController.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="d-block">
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description rows="3"></textarea>
                        </div>
                        <label class="form-label">Upload Image</label>
                        <input class="form-control" type="file" name="img" id="img">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="post" id="post">POST</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="report" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select a Reason</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="report_type" style="width:100%; padding: 3%;">
                            <option value="Reason1">Prohibited Items/Products</option>
                            <option value="Reason2">Offensive or Potential Offensive Items </option>
                            <option value="Reason3">Illegam Items/Products </option>
                            <option value="Reason4">Critically Extinct Species </option>
                            <option value="Reason5">Unrelated Items/Products </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="report" class="btn btn-danger">Send Report</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
