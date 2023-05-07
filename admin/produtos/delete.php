<?php

include('../config.php');

session_start();

if (!isset($_SESSION['email'])) {

    header("Location: " . $back_url . "/login.php");

}

$conn = mysqli_connect($db_servername,$db_username,$db_password,$db_name);

$id = $_POST['id'];

$sql = "DELETE FROM `produtos` WHERE id = {$id}";

mysqli_query($conn,$sql);

header("Location: " . $back_url . "/produtos");