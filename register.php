<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Register Account</title>
</head>
<body>

    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <center><b><label>Register</label></b></center>
                        <hr>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukan Nama Lengkap">
                        </div>

                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukan Username">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukan Password">
                        </div>

                        <button class="btn btn-register btn-block btn-success"> REGISTER </button>

                        <center><div class="text center" style="margin: top 15px;">
                            Sudah punya akun? <a href="login.php">Silahkan Login</a>
                        </div></center>
                    </div>
                </div>
            </div>           
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function(){
            $(".btn-register").click ( function(){
                var nama_lengkap = $("#nama_lengkap").val();
                var username = $("#username").val();
                var password = $("#password").val();

                if (nama_lengkap.length =="") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Nama Lengkap Wajib Diisi!'
                    });

                }else if (password.length == "")  {
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib Diisi !'
                    });

                }else{

                    $.ajax({
                        url: "simpan-register.php",
                        type: "POST",
                        data: {
                            "nama_lengkap": nama_lengkap,
                            "username": username,
                            "password": password
                        },

                        success:function(response){
                            if (response == "success") {

                                Swal.fire({
                                    type: 'success',
                                    tittle: "Register Berhasil",
                                    text: 'silahkan login!'
                                });

                                $("#nama_lengkap").val('');
                                $("#username").val('');
                                $("#password").val('');

                            }else{
                                Swal.fire({
                                    type: 'error',
                                    title : 'Register Gagal!',
                                    text : 'Silahkan coba lagi!'
                                });
                            }

                            console.log(response);
                        },
                        
                        error:function(response){
                            Swal.fire({
                                type: 'error',
                                title: 'Oops!',
                                text: 'server error!'
                            });
                        }
                    })
                }
                
                
            });
        });

    </script>
    
</body>
</html>