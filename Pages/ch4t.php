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
                <div class="col-md-3 mb-4">
                    <div class="card" style="height:600px;">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                
                                <li class="p-2 border-bottom mb-1" style="background-color: #eee;">
                                    <a href="#!" class="d-flex justify-content-between">
                                        <div class="d-flex flex-row">
                                            <img src="../img/batman.png" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">John Doe</p>
                                                <p class="small text-muted">Lorem ipsum dolor sit amet ...</p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <span class="badge bg-danger float-end">Offline</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card" style="height:598px;">
                        <div class="card-header d-flex justify-content-between align-items-center p-3" style="border-top: 4px solid #0d6efd;">
                            <h5 class="mb-0">Chat messages</h5>
                            <div class="d-flex flex-row align-items-center">
                                <span class="badge bg-primary me-3">20</span>
                                <i class="fas fa-minus me-3 text-muted fa-xs"></i>
                                <i class="fas fa-comments me-3 text-muted fa-xs"></i>
                                <i class="fas fa-times text-muted fa-xs"></i>
                            </div>
                        </div>
                        <div class="card-body" data-mdb-perfect-scrollbar="true">
                          <div class="d-flex justify-content-between">
                            <p class="small mb-1">Timona Siera</p>
                            <p class="small mb-1 text-muted">23 Jan 2:00 pm</p>
                          </div>
                          <div class="d-flex flex-row justify-content-start">
                            <img src="../img/batman.png" alt="avatar 1" style="width: 45px; height: 100%;">
                            <div>
                              <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">For what reason
                                would it
                                be advisable for me to think about business content?</p>
                            </div>
                          </div>
              
                          <div class="d-flex justify-content-between">
                            <p class="small mb-1 text-muted">23 Jan 2:05 pm</p>
                            <p class="small mb-1">Johny Bullock</p>
                          </div>
                          <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                            <div>
                              <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-primary">Thank you for your believe in
                                our
                                supports</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                              alt="avatar 1" style="width: 45px; height: 100%;">
                          </div>
              
                          <div class="d-flex justify-content-between">
                            <p class="small mb-1">Timona Siera</p>
                            <p class="small mb-1 text-muted">23 Jan 5:37 pm</p>
                          </div>
                          <div class="d-flex flex-row justify-content-start">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                              alt="avatar 1" style="width: 45px; height: 100%;">
                            <div>
                              <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">Lorem ipsum dolor
                                sit amet
                                consectetur adipisicing elit similique quae consequatur</p>
                            </div>
                          </div>
              
                          <div class="d-flex justify-content-between">
                            <p class="small mb-1 text-muted">23 Jan 6:10 pm</p>
                            <p class="small mb-1">Johny Bullock</p>
                          </div>
                          <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                            <div>
                              <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-primary">Dolorum quasi voluptates quas
                                amet in
                                repellendus perspiciatis fugiat</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                              alt="avatar 1" style="width: 45px; height: 100%;">
                          </div>
              
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                          <div class="input-group mb-0">
                            <input type="text" class="form-control" placeholder="Type message"
                              aria-label="Recipient's username" aria-describedby="button-addon2" />
                            <button class="btn btn-primary" type="button" id="button-addon2" style="padding-top: .55rem;">
                              Button
                            </button>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            function fetch_user(){
                $.ajax({
                    url:"fetchUserController.php",
                    method:"POST",
                    success:function(data){
                        $('#user_details').html(data);
                    }
                })
            }    
        })
        
    </script>
</body>
</html>