<?php
include("../Model/db.php");
session_start();

if (!empty($_SESSION['id'])) {
    if(isset($_POST['searchName'])){
        
        
    }
}




// foreach($result as $row){
   

//     $output .= '
//             <li class="p-2 border-bottom mb-1" style="background-color: #eee;">
//                 <a href="#" class="d-flex justify-content-between" id="view_messages">
//                     <div class="d-flex flex-row">
//                         <img src="../img/batman.png" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
//                         <div class="pt-1">
//                             <input type="hidden" name="user_id" value="'.$row['user_id'].'">
//                             <p class="fw-bold mb-0">'.$row['first_name'].' '.$row['last_name'].'</p>
//                             <p class="small text-muted">Lorem ipsum dolor sit amet ...</p>
//                         </div>
//                     </div>
//                     <div class="pt-1">'.$status.'</div>
//                 </a>
//             </li>
//             ';
// }

// echo $output;

?>
