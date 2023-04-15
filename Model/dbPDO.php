<?php 
$serverName = "localhost";
$userName = "root";
$password = "";
$db_name = "eaquaria";

date_default_timezone_set("Asia/Bangkok");

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$db_name", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}


function getUser($id, $conn){
   $sql = "SELECT * FROM user_details WHERE user_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

    if ($stmt->rowCount() === 1){
        $user = $stmt->fetch();
        return $user;
    }else{
        $user = [];
        return $user;
    }
}

function getConversation($user_id, $conn){
    $sql = "SELECT * FROM conversations WHERE user_1=? OR user_2=? ORDER BY conversation_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id, $user_id]);

    if($stmt->rowCount() > 0){
        $conversations = $stmt->fetchAll();
        $user_data = [];
        
        foreach($conversations as $conversation){
            if ($conversation['user_1'] == $user_id) {
            	$sql2  = "SELECT * FROM users WHERE user_id=?";
            	$stmt2 = $conn->prepare($sql2);
            	$stmt2->execute([$conversation['user_2']]);
            }else {
            	$sql2  = "SELECT * FROM users WHERE user_id=?";
            	$stmt2 = $conn->prepare($sql2);
            	$stmt2->execute([$conversation['user_1']]);
            }
            $allConversations = $stmt2->fetchAll();
            array_push($user_data, $allConversations[0]);
        }

        return $user_data;

    }else {
    	$conversations = [];
    	return $conversations;
    }  

}


function last_seen($date_time){
   $timestamp = strtotime($date_time);	
   $strTime = array("second", "minute", "hour", "day", "month", "year");
   $length = array("60","60","24","30","12","10");

   $currentTime = time();
   if($currentTime >= $timestamp){
		$diff = time()- $timestamp;
		for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
		    $diff = $diff / $length[$i];
		}
		$diff = round($diff);
		if ($diff < 59 && $strTime[$i] == "second") {
			return 'Active';
		}else {
			return $diff . " " . $strTime[$i] . "(s) ago ";
		}
   }
}
function lastChat($id_1, $id_2, $conn){
   $sql = "SELECT * FROM chats WHERE (from_id=? AND to_id=?) OR (to_id=? AND from_id=?) ORDER BY chat_id DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

    if ($stmt->rowCount() > 0) {
    	$chat = $stmt->fetch();
    	return $chat['message'];
    }else {
    	$chat = '';
    	return $chat;
    }

}
function getChats($id_one, $id_two, $conn){
   
   $sql = "SELECT * FROM chats WHERE (from_id=? AND to_id=?) OR (to_id=? AND from_id=?) ORDER BY chat_id ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_one, $id_two, $id_one, $id_two]);

    if ($stmt->rowCount() > 0) {
    	$chats = $stmt->fetchAll();
    	return $chats;
    }else {
    	$chats = [];
    	return $chats;
    }

}
function opened($id_1, $conn, $chats){
    foreach ($chats as $chat) {
    	if ($chat['opened'] == 0) {
    		$opened = 1;
    		$chat_id = $chat['chat_id'];

    		$sql = "UPDATE chats SET   opened = ? WHERE from_id=? AND   chat_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$opened, $id_1, $chat_id]);

    	}
    }
}