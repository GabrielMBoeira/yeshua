<?php
session_start();
require_once('../connect.php');
require_once('../../models/Client.php');

$conn = Connection::newConnection('db');
$client = new Client();

$name = mysqli_real_escape_string($conn, $_POST['name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$service = mysqli_real_escape_string($conn, $_POST['service']);
$status = 'active';

if (isset($_POST['submitCreate'])) {

    if ($client->insert($conn, $name, $phone, $email, $status, $service)) {
        header('location: ../../list');
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger mt-5' role='alert'>Erro ao cadastrar atendimento!</div>";
        header('location: ../../create');
    }
}
