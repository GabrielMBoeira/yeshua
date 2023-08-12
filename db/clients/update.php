<?php
session_start();
require_once('../connect.php');
require_once('../../models/Client.php');

$conn = Connection::newConnection('db');
$client = new Client();
$id = mysqli_real_escape_string($conn, $_GET['client']);

if (isset($_GET['client'])) {

    if ($client->update($conn, $id)) {
            header('location: ../../admin/painel.php');
    } else {
            $_SESSION['msg'] =  "<div class='alert alert-danger mb-5' role='alert'> Erro ao finalizar atendimento! </div>";
            header('location: ../../admin/painel.php');
    }

} 
