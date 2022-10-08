<?php

include('koneksi.php');

$nama_lengkap   = $_POST['nama_lengkap'];
$username       = $_POST['username'];
$password       = MD5($_POST['password']);

$query = "INSERT INTO tbl_users (nama_lengkap, username, password) VALUES ('$nama_lengkap', '$username', '$password')";

if($connection->query($query)){

    echo "success";

}else{
    echo "error";
}

?>