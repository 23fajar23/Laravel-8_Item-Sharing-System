<?php 

include('connect.php');

date_default_timezone_set("Asia/Jakarta");
$chat = $_POST['pesan'];
$user1 = $_POST['user1'];
$user2 = $_POST['user2'];
$key = $user1.$user2;
$tanggal = date("Y/m/d");
$waktu = date("h:i:sa");


$insert = mysqli_query($connect, "INSERT INTO `dbpesan`(`id`, `pesan`, `key`, `user1`, `user2`, `tanggal`, `waktu`, `remember_token`, `created_at`, `updated_at`) VALUES ('','$chat', '$key', '$user1', '$user2', '$tanggal', '$waktu','','','')");
include('data.php');

?>
