<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../Includes/head.inc.php") ?>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> 
</head>
<body>

    <?php
    $connect = new PDO('mysql:host=localhost;dbname=eaquaria', 'root', '');
    session_start();
    $userid = $_SESSION['id'];
    $breedersblog_id = $_GET['id'];

    $query = "SELECT * FROM comment WHERE breedersblog_id = $breedersblog_id && parent_comment_id = '0'";
    $query1 = "SELECT * FROM user_details WHERE user_id = $userid";

    $statement1 = $connect->prepare($query1);
    $statement1->execute();
    $result1 = $statement1->fetchAll();

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';

    foreach($result as $row){
        foreach($result1 as $row1){
            $output .= '
                    <li>
                        <div class="comment">
                            <figure class="comment-media">
                                <a href="#">
                                    <img src="'.$row1['user_img'].'" alt="User name">
                                </a>
                            </figure>

                            <div class="comment-body">
                                <a class="comment-reply" id="'.$row['comment_id'].'">Reply</a>
                                <div class="comment-user">
                                    <h4><a href="#">'.$row['comment_sender_name'].'</a></h4>
                                    <span class="comment-date">'.$row['date'].'</span>
                                </div>

                                <div class="comment-content">
                                    <p>'.$row['comment'].'</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    ';
                $output .= get_reply_comment($connect, $row["comment_id"]);
        }
    }
    echo $output;

    function get_reply_comment($connect, $parent_id = 0, $marginleft = 0){
        $userid = $_SESSION['id'];
        $query1 = "SELECT * FROM user_details WHERE user_id = $userid";
        $statement1 = $connect->prepare($query1);
        $statement1->execute();
        $result1 = $statement1->fetchAll();
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
                 foreach($result1 as $row1){
                    $output .= '
                        <li style="margin-left:'.$marginleft.'px">
                            <div class="comment">
                                <figure class="comment-media">
                                    <a href="#">
                                        <img src="'.$row1['user_img'].'" alt="User name">
                                    </a>
                                </figure>

                                <div class="comment-body">
                                    <a class="comment-reply" id="'.$row['comment_id'].'">Reply</a>
                                    <div class="comment-user">
                                        <h4><a href="#">'.$row['comment_sender_name'].'</a></h4>
                                        <span class="comment-date">'.$row['date'].'</span>
                                    </div>

                                    <div class="comment-content">
                                        <p>'.$row['comment'].'</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    ';
                    $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
                }
            }
        }
        return $output;
    }
    ?>
    
    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>