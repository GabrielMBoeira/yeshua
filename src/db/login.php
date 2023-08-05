<?php
session_start();
require_once('connect.php');

$conn = Connection::newConnection();
$login = mysqli_real_escape_string($conn, $_POST['login']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (isset($_POST['submitLogin'])) {

    if ($login == 'yeshua' && $password == 'yeshuajaison') {
        header('location: ../../painel');
    } else {
        $_SESSION['msg'] =  "<div class='alert alert-danger mb-5' role='alert'>Senha e login não conferem! </div>";
        header('location: ../../login');
    }
}
