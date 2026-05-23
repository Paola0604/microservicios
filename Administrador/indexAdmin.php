<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="css/cssindex.css" rel="stylesheet" type="text/css"/>
</head>
<body>

    <?php include 'Components/headerAdmin.php'; ?>

        <!-- Secciones del dashboard (cards) -->
        <div class="container-fluid">
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card card-custom mb-4">
                        <div class="card-body text-center">
                            <i class="fas fa-folder-open"></i>
                            <h5 class="card-title">Categorías</h5>
                            <p class="card-text">Gestiona tus categorías</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card card-custom mb-4">
                        <div class="card-body text-center">
                            <i class="fas fa-box-open"></i>
                            <h5 class="card-title">Productos</h5>
                            <p class="card-text">Gestiona los productos</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card card-custom mb-4">
                        <div class="card-body text-center">
                            <i class="fas fa-users"></i>
                            <h5 class="card-title">Usuarios</h5>
                            <p class="card-text">Gestiona los usuarios</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      
        // Script para manejar los submenús
        const menuItems = document.querySelectorAll('.menu-item');

        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                const targetSubmenu = document.getElementById(this.getAttribute('data-target'));
                const isVisible = targetSubmenu.style.display === 'block';
                
                // Ocultar todos los submenús antes de mostrar el nuevo
                document.querySelectorAll('.submenu').forEach(submenu => {
                    submenu.style.display = 'none';
                });
                
                // Mostrar u ocultar el submenú correspondiente
                if (!isVisible) {
                    targetSubmenu.style.display = 'block';
                }
            });
        });
    </script>
</body>
</html>