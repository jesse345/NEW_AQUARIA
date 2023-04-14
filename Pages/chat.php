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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <title>CHAT</title>
    <style>
        .row>*{
            padding-right:0!important;
            padding-left:0!important;
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
                            <ul class="list-unstyled mb-0">
                                <span id="user_details"></span>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card" style="height:598px;">
                        <div class="card-header d-flex justify-content-between align-items-center p-3" style="border-top: 4px solid #0d6efd;">
                            <h5 class="mb-0">Chat messages</h5>
                        </div>

                        <!--END END END-->
                        <div class="card-body" data-mdb-perfect-scrollbar="true">
                            <div class="d-flex justify-content-start">
                                <p class="small mb-1">Timona Siera</p>
                            </div>
                            <div class="d-flex flex-row justify-content-start">
                                <img src="../img/batman.png" alt="avatar 1" style="width: 45px; height: 100%;">
                                <div>
                                <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">For what reason
                                    would it
                                    be advisable for me to think about business content?</p>
                                </div>
                            </div>
                            <!--END END END-->

                            <div class="d-flex justify-content-end">
                                <p class="small float-right">Johny Bullock</p>
                            </div>
                            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                <div>
                                    <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-primary">Thank you for your believe in our supports</p>
                                </div>
                                <img src="../img/batman.png" alt="avatar 1" style="width: 45px; height: 100%;">
                            </div>

                        </div>
                        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                            <form action="">
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control" placeholder="Type message" style="width:638px;"/>
                                    <button class="btn btn-primary" type="button" id="button-addon2" style="padding-top: .55rem;">Button</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script>  
    $(document).ready(function(){

      fetch_user();

      function fetch_user(){
        $.ajax({
          url:"../Controller/fetchUserController.php",
          method:"POST",
          success:function(data){
            $('#user_details').html(data);
          }
        })
      }

      
      
    });  
</script>
</body>
</html>