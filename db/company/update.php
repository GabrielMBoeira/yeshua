<?php
session_start();
require_once('../connect.php');
require_once('../../models/Company.php');

$conn = Connection::newConnection('db');
$company = new Company();
$status = mysqli_real_escape_string($conn, $_POST['status']);

if (isset($_POST['status'])) {

    if ($company->updateStatusCompany($conn, $status)) {
        header('location: ../../admin/painel.php');
    } else {
        $_SESSION['msg'] =  "<div class='alert alert-danger mb-5' role='alert'> Erro ao finalizar atendimento! </div>";
        header('location: ../../admin/painel.php');
    }
} 
