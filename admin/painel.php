<?php
require_once('templates_admin/header.php');
require_once('../db/connect.php');

$conn = Connection::newConnection();
$status = 'active';
$sql = "SELECT * FROM clients WHERE status = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $status);
$stmt->execute();
$result = $stmt->get_result();
?>

<main id="main">

    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center" id="painel-main">

            <?php
            if (isset($_SESSION['msg'])) {
                print_r($_SESSION['msg']);
                unset($_SESSION['msg']);
            }
            ?>

            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <div class="section-title">
                        <h2>Atendimentos</h2>
                        <p>Lista de espera</p>
                    </div>
                </div>
                <div>
                    <div class="table-responsive">
                        <table class="table text-light table-list">

                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="src/db/update.php" method="post">

                                    <?php
                                    if ($result->num_rows > 0) {

                                        while ($data = $result->fetch_assoc()) {

                                    ?>
                                            <input type="hidden" name="client" value="<?= $data['id'] ?>">
                                            <tr>
                                                <td style="vertical-align: middle;" class="text-truncate"> <?= $data['id'] ?> </td>
                                                <td style="vertical-align: middle;" class="text-truncate"> <?= $data['name'] ?> </td>
                                                <td style="vertical-align: middle;" class="text-truncate"> <?= $data['phone'] ?> </td>
                                                <td style="vertical-align: middle;">
                                                    <a type="submit" href="../db/update.php?client=<?= $data['id'] ?>" name="submitAtendido" class="btn btn-sm" style="background-color: #cda45e; color: #fff">Atendido</a>
                                                </td>
                                            </tr>

                                    <?php
                                        }
                                    }
                                    ?>

                                </form>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>