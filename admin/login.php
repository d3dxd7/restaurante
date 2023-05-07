<?php

session_start();

include('config.php');

$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

$email = addslashes($_POST['email']);

$senha = md5($_POST['senha']);

$sql = "
select * from usuarios where
email = '{$email}' and
senha = '{$senha}' and
status = '1'
";

$result = mysqli_query($conn,$sql);

if($result->num_rows > 0) {

    $row = mysqli_fetch_array($result,MYSQLI_BOTH);

    $_SESSION['email'] = $row['email'];

    header("Location: dashboard.php");

} else {

    header("Location: {$back_url}/index.php?alerta=danger&mensagem=E-mail ou senha inválidos.");

}
