<?php
session_start();

if(isset($_SESSION['id'])){
    include("../Model/dbPDO.php");


    if(empty($_GET['user'])){
        $user = getUser($_SESSION['id'], $conn);
        $conversations = getConversation($user['user_id'], $conn);
    }else{
        $chatWith = getUser($_GET['user'], $conn);
        if (empty($chatWith)) {
            header("Location: index.php");
            exit;
  	    }
        $chats = getChats($_SESSION['id'], $chatWith['user_id'], $conn);
        opened($chatWith['user_id'], $conn, $chats);
    } 
}else{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    
    <title>CHAT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .row>*{
            padding-right:0!important;
            padding-left:0!important;
        }
        .alert-primary{
            background-color:#0d6efd!important;
            color:#fff!important
        }
    </style>
</head>
<body>
    <section>
        <div class="container py-4">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card" style="height:600px;">
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" placeholder="Search..." id="searchText" class="form-control">
                                <button class="btn btn-primary" id="searchBtn"><i class="fa fa-search"></i></button>       
                            </div>
                            <ul class="list-unstyled mb-0 overflow-auto" id="chatList">
                                <?php if (!empty($conversations)) { ?>
                                    <?php 
                                    foreach ($conversations as $conversation){ ?>
                                    <li class="list-group-item">
                                        <a href="chat.php?user=<?=$conversation['username']?>" class="d-flex justify-content-between align-items-center p-2">
                                            <div class="d-flex align-items-center">
                                                <img src="uploads/<?=$conversation['p_p']?>" class="w-10 rounded-circle">
                                                <h3 class="fs-xs m-2">
                                                    <?=$conversation['name']?><br>
                                    <small>
                                        <?php 
                                        echo lastChat($_SESSION['user_id'], $conversation['user_id'], $conn);
                                        ?>
                                    </small>
                                                </h3>            	
                                            </div>
                                            <?php if (last_seen($conversation['last_seen']) == "Active") { ?>
                                                <div title="online">
                                                    <div class="online"></div>
                                                </div>
                                            <?php } ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                <?php }else{ ?>
                                    <div class="alert alert-info text-center">
                                    <i class="fa fa-comments d-block fs-big"></i>
                                    No messages yet, Start the conversation
                                    </div>
                                <?php } ?>
                                   
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card" style="height:598px;">
                        <div class="card-header" style="border-top: 4px solid #0d6efd;">
                            <div class="d-flex">
                                <?php
                                if(!empty($_GET['user'])){
                                     ?>
                                    <img src="../img/batman.png" class="rounded-circle" style="height:70px;">
                                    <h3 class="display-4 fs-sm m-2" style="font-size:18px;">
                                        <?php echo $chatWith['first_name'].' '.$chatWith['last_name'] ?> <br>
                                        <div class="d-flex
                                                    align-items-center"
                                                title="online">
                                            <?php
                                                if (last_seen($chatWith['last_seen']) == "Active") {
                                            ?>
                                                <div class="online"></div>
                                                <small class="d-block p-1">Online</small>
                                            <?php }else{ ?>
                                                <small class="d-block p-1">
                                                    Last seen:
                                                    <?=last_seen($chatWith['last_seen'])?>
                                                </small>
                                            <?php } ?>
                                        </div>
                                    </h3>
                                <?php }else{?>
                                   <h3>Chat Messages</h3>
                                <?php }?>
                            </div>
                        </div>
                        <!--END END END-->
                        
                        <div class="card-body" data-mdb-perfect-scrollbar="true" id="chatBox">
                            <?php
                            if(!empty($chats)){
                                foreach($chats as $chat){  
                                    if($chat['from_id'] == $_SESSION['id']){ 
                                        ?>  
                                        <div class="d-flex justify-content-end">
                                            <p class="small float-right"><?php echo $user['first_name'].' '.$user['last_name']?></p>
                                        </div>
                                        <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                            <div>
                                                <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-primary"><? echo $chat['message']?> </p>
                                            </div>
                                            <img src="../img/batman.png" alt="avatar 1" style="width: 45px; height: 100%;">
                                        </div>
                                    <?php }else{ ?>
                                        <div class="d-flex justify-content-start">
                                            <p class="small mb-1"><?php echo $chatWith['first_name'].' '.$chatWith['last_name']?></p>
                                        </div>
                                        <div class="d-flex flex-row justify-content-start">
                                            <img src="../img/batman.png" alt="avatar 1" style="width: 45px; height: 100%;">
                                            <div>
                                                <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;"><? echo $chat['message']?>
                                            </div>
                                        </div>
                                    <?php }
                                }
                            }else{?>
                            <div class="alert alert-primary text-center">
                                <i class="fa fa-comments d-block fs-big"></i>
                                No messages yet, Start the conversation
                            </div>
                        <?php } ?>
                        </div>
                        <!--END END END-->

                        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                            <form method="POST" id="comment_form">
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control" id="message" placeholder="Type message" style="width:638px;"/>
                                    <button type="submit" class="btn btn-primary" id="sendBtn" style="padding-top: .55rem;">Button</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script>
    var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	}
    scrollDown();

	$(document).ready(function(){
        var to_id = <?php echo $_GET['user']?>
        $("#comment_form").on('submit', function(){
            message = $("#message").val();
            if (message == "") return;

            $.post("../Controller/insertController.php",
                {
                    message: message,
                    to_id: to_id
                },
                function(data, status){
                    $("#message").val("");
                    $("#chatBox").append(data);
                    scrollDown();
                });
        });





        // Search
        $("#searchText").on("input", function(){
            var searchText = $(this).val();
            if(searchText == "") return;
            $.post('../Controller/searchController.php', 
                    {
                        key: searchText
                    },
                function(data, status){
                    $("#chatList").html(data);
                });
            
        });

        // Search using the button
        $("#searchBtn").on("click", function(){
            var searchText = $("#searchText").val();
            if(searchText == "") return;
            $.post('../Controller/searchController.php', 
                    {
                        key: searchText
                    },
                function(data, status){
                    $("#chatList").html(data);
                });
            
        });


        /** 
         auto update last seen 
        for logged in user
        **/
        let lastSeenUpdate = function(){
            $.get("../Controller/updateLastSeen.php");
        }
        lastSeenUpdate();
        /** 
         auto update last seen 
        every 10 sec
        **/
        setInterval(lastSeenUpdate, 10000);

    });
</script>
</body>
</html>