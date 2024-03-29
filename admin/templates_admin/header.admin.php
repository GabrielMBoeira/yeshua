<?php
require_once('db/connect.php');
require_once('models/Company.php');

$conn = Connection::newConnection();
$db = new Company();
$statusCompany = $db->getStatusCompany($conn);
$conn->close();
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Yeshua</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/tesoura-aba.png" rel="icon">
    <!-- <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-center justify-content-md-between">

            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-telephone d-flex align-items-center"><span class="telFone">+55 48 9617 5261</span></i>
                <i class="bi bi-clock d-flex align-items-center ms-4"><span class="preVenda">Horários 08:00hs às 18:00hs</span></i>
            </div>
        </div>
    </div>

    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="#">Administrador</a></h1>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="../home">Home</a></li>
                    <li><a class="nav-link scrollto" href="../list">Lista de espera</a></li>
                    <li><a class="nav-link scrollto" href="../create">Cadastrar atendimento</a></li>
                    <!--<li><a class="nav-link scrollto" href="#specials">Notícias</a></li>
                    <li><a class="nav-link scrollto" href="#events">Eventos</a></li>
                    <li><a class="nav-link scrollto" href="#chefs">Projeto</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contato</a></li> -->
                    <?php if ($statusCompany === 'open') { ?>
                        <li class="btnAlterAgenda">
                            <div class="btnMenuAlterar">
                                <form action="../db/company/update.php" method="post" class="form-btn-menu">
                                    <input type="hidden" name="status" value="close">
                                    <button class="btn btn-sm btn-success mx-3">Agenda está aberta</button>
                                </form>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="btnAlterAgenda">
                            <form action="../db/company/update.php" method="post">
                                <input type="hidden" name="status" value="open">
                                <button class="btn btn-sm btn-danger mx-3">Agenda está fechada</button>
                            </form>
                        </li>
                    <?php } ?>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>