<?php 

session_start();

# check if the user is logged in
if (isset($_SESSION['id'])) {

	if (isset($_POST['id_2'])) {
		
	# database connection file
	include("../Model/dbPDO.php");
	$user = getUser($_POST['id_2'], $connection);
	$id_1  = $_SESSION['id'];
	$id_2  = $_POST['id_2'];
	$opend = 0;

    
	$sql = "SELECT * FROM chats
	        WHERE to_id=?
	        AND   from_id= ?
	        ORDER BY chat_id ASC";
	$stmt = $connection->prepare($sql);
	$stmt->execute([$id_1, $id_2]);

	if ($stmt->rowCount() > 0) {
	    $chats = $stmt->fetchAll();

	    # looping through the chats
	    foreach ($chats as $chat) {
	    	if ($chat['opened'] == 0) {
	    		
	    		$opened = 1;
	    		$chat_id = $chat['chat_id'];

	    		$sql2 = "UPDATE chats
	    		         SET opened = ?
	    		         WHERE chat_id = ?";
	    		$stmt2 = $connection->prepare($sql2);
	            $stmt2->execute([$opened, $chat_id]); 

	            ?>
					<div class="d-flex justify-content-start">
						<p class="small float-right"><?php echo ucfirst($user['first_name']).' '.ucfirst($user['last_name'])?></p>
					</div>
					<div class="d-flex flex-row justify-content-start mb-4 pt-1">
						<div>
							<p class="small p-2 me-3 mb-3 text-white rounded-3 bg-primary"><?php echo $chat['message']?> </p>
						</div>
						<img src="../img/batman.png" alt="avatar 1" style="width: 45px; height: 100%;">
					</div>
	            <?php
	    	}
	    }
	}

 }

}else {
	header("Location: ../../index.php");
	exit;
}