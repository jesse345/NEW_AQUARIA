<?php
include("../Model/dbForPDO.php");
session_start();

$query = "
SELECT * FROM user_details 
WHERE user_id != '".$_SESSION['id']."' 
";


$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();


foreach($result as $row){
    $output = '';
    $status = '';
    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
    $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);

   

    if($user_last_activity > $current_timestamp){
        $status = '<span class="label label-success">Online</span>';
    }else{
        $status = '<span class="label label-danger">Offline</span>';
    }

    $output .= '
            <li class="p-2 border-bottom mb-1" style="background-color: #eee;">
                <a href="#!" class="d-flex justify-content-between">
                    <div class="d-flex flex-row">
                        <img src="../img/batman.png" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                        <div class="pt-1">
                            <p class="fw-bold mb-0">'.$row['first_name'].' '.$row['last_name'].'</p>
                            <p class="small text-muted">Lorem ipsum dolor sit amet ...</p>
                        </div>
                    </div>
                    <div class="pt-1">'.$status.'</div>
                </a>
            </li>
            ';
}

echo $output;

?>
