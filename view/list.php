<?php
require_once('templates/header.php');
require_once('db/connect.php');
require_once('models/Client.php');

$conn = Connection::newConnection('main');
$db = new Client();
$result = $db->selectClientsActives($conn);
?>

<main id="main">

    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center" id="painel-main">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <div class="section-title">
                        <h2>Atendimentos</h2>
                        <p>Lista de espera</p>
                    </div>
                </div>
                <div class="box-list">
                    <div class="table-responsive">

                        <?php if ($result->num_rows > 0) { ?>

                            <table class="table text-light table-list">

                                <thead>
                                    <tr>
                                        <th scope="col"> Ordem </th>
                                        <th scope="col"> Nome </th>
                                        <th scope="col"> Serviço </th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                $i = 1;
                                while ($data = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-truncate"> <?= $i ?> </td>
                                        <td style="vertical-align: middle;" class="text-truncate"> <?= $data['name'] ?> </td>
                                        <td style="vertical-align: middle;" class="text-truncate"> <?= $data['service'] ?> </td>
                                    </tr>
                                        
                                <?php 
                                $i++;
                                } 
                                ?>

                                </tbody>
                            </table>

                        <?php } else { ?>
                            <p>Não há atendimento cadastrado</p>
                            <p>Você será o primeiro a ser atendido</p>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

</main>