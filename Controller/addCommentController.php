<?php
$connect = new PDO('mysql:host=localhost;dbname=eaquaria', 'root', '');

$error = '';
$comment_name = '';
$comment_content = '';


if(empty($_POST["comment_content"])){
    $error .= '<p class="text-danger">Comment is required</p>';
}else{
    $comment_content = $_POST["comment_content"];
    $comment_name = $_POST["comment_name"];
    $breedersblog_id = $_POST["breedersblog_id"];
}

if($error == ''){
    $query = "INSERT INTO comment (breedersblog_id,parent_comment_id, comment, comment_sender_name) VALUES (:breedersblog_id,:parent_comment_id, :comment, :comment_sender_name)";
    $statement = $connect->prepare($query);
    $statement->execute(
    array(
        'breedersblog_id' => $breedersblog_id,
        ':parent_comment_id' => $_POST["comment_id"],
        ':comment'    => $comment_content,
        ':comment_sender_name' => $comment_name
    )
    );
    $error = '<label class="text-success">Comment Added</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>