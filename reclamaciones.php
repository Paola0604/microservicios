<?php
// mensaje enviado y error
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'success') {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alertSuccess">
                <strong>Éxito!</strong> Reclamación registrada correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    } elseif ($_GET['msg'] == 'error') {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertError">
                <strong>Error!</strong> Error al registrar la reclamación. Por favor, intenta nuevamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Samuk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Custom CSS -->
    <link href="assets/css/cssLoginyRegis.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/cssCategorias.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/cssheader.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/cssfooter.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/cssCarrusel.css" rel="stylesheet" type="text/css"/>
    
    <style>
        .alert {
            transition: all 0.5s ease;
            opacity: 0;
            transform: translateY(-20px);
        }

        .alert.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <?php include 'components/header.php'; ?>

    <div class="bg-light text-dark py-5" id="tempaltemo_footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="h2 text-center mb-4 border-bottom pb-3 border-light">Libro de Reclamaciones</h2>
                    
                    <!-- Message alert -->
                    <?php
                    // Display alert message if set
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == 'success') {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alertSuccess">
                                    <strong>Éxito!</strong> Reclamación registrada correctamente.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                        } elseif ($_GET['msg'] == 'error') {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertError">
                                    <strong>Error!</strong> Error al registrar la reclamación. Por favor, intenta nuevamente.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                        }
                    }
                    ?>

                    <form action="DAO/Reclamaciones/agregar_reclamacion.php" method="post" class="custom-form bg-light p-4 rounded shadow">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                        </div>
                        <div class="mb-3">
                            <label for="reclamacion" class="form-label">Reclamación:</label>
                            <textarea class="form-control" id="reclamacion" name="reclamacion" rows="4" placeholder="Describe tu queja" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fade in the alert if it exists
            if ($('.alert').length) {
                $('#alertSuccess, #alertError').addClass('show');
                // Fade out the alert after 5 seconds
                setTimeout(function() {
                    $('#alertSuccess, #alertError').alert('close');
                }, 5000);
            }
        });
    </script>
    <!-- End Script -->
</body>

</html>