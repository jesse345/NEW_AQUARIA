<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="../css/comment.css">
</head>
<body>

    <?php
    $connect = new PDO('mysql:host=localhost;dbname=eaquaria', 'root', '');
    $id = $_GET['id'];

    $query = "SELECT * FROM comment WHERE breedersblog_id = $id && parent_comment_id = '0' ORDER BY comment_id DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';

    foreach($result as $row){
        $output .= '
            <div class="card mb-2">
                <div class="card-header">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i>
                    <span style="float:right;">
                        <a href="#"><i class="fas fa-edit" style="color:black;"></i></a>
                        <a href="../Controller/commentDeleteController.php?comment_id='.$row["comment_id"].'"><i class="fas fa-trash" style="color:black;"></i></a>
                    </span>
                </div>
                <div class="card-body">
                    <span>'.$row["comment"].'</span>
                    <span style="float:right;"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></span>
                </div>
            </div>
                ';
            $output .= get_reply_comment($connect, $row["comment_id"]);
    }
    echo $output;

    function get_reply_comment($connect, $parent_id = 0, $marginleft = 0){
        $query = "SELECT * FROM comment WHERE parent_comment_id = '".$parent_id."' ";
        $output = '';
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $count = $statement->rowCount();
        if($parent_id == 0){
            $marginleft = 0;
        }else{
            $marginleft = $marginleft + 48;
        }
        if($count > 0){
            foreach($result as $row){
                $output .= '
                <div class="card mb-2" style="margin-left:'.$marginleft.'px">
                    <div class="card-header">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i>
                        <span style="float:right;">
                            <a href="#"><i class="fas fa-edit" style="color:black;"></i></a>
                            <a href="#"><i class="fas fa-trash" style="color:black;"></i></a>
                        </span>
                    </div>
                    <div class="card-body">
                        <span>'.$row["comment"].'</span>
                        <span style="float:right;"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></span>
                    </div>
                 </div>
                ';
                $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
            }
        }
        return $output;
    }
    ?>
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