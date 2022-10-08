<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Login</title>
</head>
<body>

    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <center><b><label>Login</label></b></center>
                        <hr>
                        
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" id="username" placeholder="Masukan Username">                          
                        </div>

                        <div class="form-group">
                          <label>Password</label>
                          <input type="Password" class="form-control" id="password" placeholder="Masukan Password">                          
                        </div>

                        <button class="btn btn-login btn-block btn-success">Login</button>

                        </div>
                    </div>

                    <div class="text-center" style="margin-top: 15">
                        Belum punya akun? <a href="register.php">Silahkan Register</a>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function(){

            $(".btn-login").click( function() {

                var username = $("#username").val();
                var password = $("#password").val();
            
                if(username.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Username Harus Diisi!'
                    });
                }else if(password.length == "") {

                    Swal.fire ({
                        type: 'warning',
                        title: 'Oops..!',
                        text: 'Password Harus Diisi !'
                    });

                }else {

                    $.ajax({

                        url: "cek-login.php",
                        type: "POST",
                        data: {
                            "username": username,
                            "password": password
                        },

                        success:function(response){
                            if (response == "success") {
                                
                                Swal.fire({
                                    type: 'success',
                                    title: 'Login Berhasil!',
                                    text: 'Selamat Anda Berhasil Login',
                                    timer: 3000,
                                    showCancelButton: false,
                                    showConfirmButton:false
                                })
                                .then (function() {
                                    window.location.href = "dashboard.php";
                                });
                            }else{

                                Swal.fire({
                                    type: 'error',
                                    title: 'Login Gagal',
                                    text: 'Silahkan coba lagi!'
                                });

                            }

                            console.log(response);

                        },
                        error:function(response){                 

                                Swal.fire({
                                    type: 'error',
                                    title: 'Oops..!',
                                    text: 'Server Error!'
                                });

                                console.log(response);
                            }

                    });
                }
                
            });
        });

    </script>

</body>
</html>