<?php
session_start();
$connect = new PDO('mysql:host=localhost;dbname=eaquaria', 'root', '');
$session_id = $_SESSION['id'];
$breedersblog_id = $_GET['breedersblog_id'];

$users =$connect->query("SELECT user_details.first_name, user_details.last_name,id description,image,date_created FROM user_details INNER JOIN breedersblog ON user_details.user_id = breedersblog.user_id WHERE breedersblog.id = $breedersblog_id");
$user = $users->fetch(PDO::FETCH_ASSOC);
$users1 =$connect->query("SELECT * FROM user_details WHERE user_id = $session_id");
$user1 = $users1->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> 
    <title>Document</title>
</head>
<body>
        <div class="container mt-5">
            <div class="d-flex flex-column ">
            <div class="d-inline-flex">
                <p class="m-0"><a href="../">Home</a></p>
                <p class="m-0 px-1">></p>
                <p class="m-0"><a href="../Pages/breedersBlog.php">Breeder's blog</a></p>
                <p class="m-0 px-1">></p>
                <p class="m-0"><?php echo ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name'])?>'s Post</p>
            </div>
            </div>
        </div>  
    
        <div class="container mt-5 mb-5">
            <div class="row d-flex align-items-center justify-content-center">
            <?php
            $allpost=$connect->query("Select * from `breedersblog` WHERE id = $breedersblog_id");
            while($posts = $allpost->fetch(PDO::FETCH_ASSOC)){ 
             
                ?>
                <div class="col-md-8 mb-5">
                    <div class="card">
                        <div class="d-inline-flex justify-content-between p-2 px-3">
                            <div class="d-flex flex-row align-items-center"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="45" class="rounded-circle">
                                <div class="d-flex flex-column ml-3"> <span class="font-weight-bold"><?php echo ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name'])?></span> <small class="text-primary"><?php echo $posts['date_created']?></small> </div>
                            </div>
                            <div class="dropdown d-flex mt-1">
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h" style="color:black;"></i></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin-top:-26px!important;">
                                    <li><a class="dropdown-item" data-bs-toggle="modal"data-bs-target="#report">Report</a></li>
                                </ul>
                            </div>
                        </div> 
                        <div class="p-2">
                            <p class="text-justify"><?php echo $posts['description']?></p>
                        </div>  
                        <img src="../img/<?php echo $posts['image'] ?>" class="img-fluid" style="height:270px!important;">
            <?php  } ?>
                        <form method="POST" id="comment_form">
                            <div class="input-group">
                                <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="1"></textarea>
                                <input type="hidden" name="breedersblog_id" id="breedersblog_id" class="form-control" value="<?php echo $breedersblog_id ?>"/>
                                <input type="hidden" name="comment_name" id="comment_name" class="form-control" value="<?php echo ucfirst($user1['first_name']) . ' ' . ucfirst($user1['last_name'])?>"/>
                                <input type="hidden" name="comment_id" id="comment_id" value="0" />
                                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                            </div>
                        </form>
                        <span id="comment_message"></span>
                        <br/>
                        <div id="display_comment" style="margin-left:10px;margin-right:10px;"></div>
                    </div>
                </div>
            </div>
        </div>







    
            
<script>
    $(document).ready(function(){
        
        var breedersblog_id = '<?php echo $_GET['breedersblog_id'] ?>';


        $('#comment_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"../Controller/addCommentController.php",
                method:"POST",
                data:form_data,
                dataType:"JSON",
                success:function(data){
                    if(data.error != ''){
                        $('#comment_form')[0].reset();
                        $('#comment_message').html(data.error);
                        $('#comment_id').val('0');
                        load_comment()
                    }
                }
            })
        });
        load_comment()
        
        function load_comment(){
        $.ajax({
            url:"../Controller/fetchCommentController.php?id="+breedersblog_id,
            method:"POST",
            success:function(data){
                 $('#display_comment').html(data);
            }
        })
        }

        $(document).on('click', '.reply', function(){
        var comment_id = $(this).attr("id");
        $('#comment_id').val(comment_id);
        $('#comment_content').focus();
        });
    
    });
</script>
</body>
</html>