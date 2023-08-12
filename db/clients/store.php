<?php
session_start();
require_once('../connect.php');
require_once('../../models/Client.php');

$conn = Connection::newConnection('db');
$client = new Client();

$name = mysqli_real_escape_string($conn, $_POST['name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$birth = mysqli_real_escape_string($conn, $_POST['birth']);
$status = 'active';

if (isset($_POST['submitCreate'])) {

    if ($client->insert($conn, $name, $phone, $birth, $status)) {
        header('location: ../../list.php');
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger mt-5' role='alert'>Erro ao cadastrar atendimento!</div>";
        header('location: ../../create.php');
    }
}
