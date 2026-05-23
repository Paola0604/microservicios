<!DOCTYPE html>
<html lang="es">

<head>
    <title>Acerca de Nosotros | Samuk SAC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon y estilos -->
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link href="assets/css/cssheader.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/cssLoginyRegis.css" rel="stylesheet" type="text/css"/>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .justified-text {
            text-align: justify;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .mission-vision {
            margin-top: 40px;
        }
        .service-icon {
            font-size: 2rem;
            color: #28a745; /* Bootstrap success color */
        }
        .services-icon-wap {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            transition: transform 0.3s;
        }
        .services-icon-wap:hover {
            transform: scale(1.05);
        }
      
        .factory-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
        }
        .factory-info img {
            width: 100%;
            height: auto;
        }
        .factory-text {
            flex: 1;
            margin-right: 20px;
        }
        
        .background-image {
        background-image: url('assets/img_2.0/factory.webp');
        background-size: cover; /* Para que la imagen cubra toda la sección */
        background-repeat: no-repeat;
        background-position: center;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 0; /* Envía la imagen al fondo */
        opacity: 0.5; /* Opacidad de la imagen */
    }

    .intro-section {
        position: relative; /* Permite que la imagen de fondo se posicione correctamente */
        min-height: 500px; /* Asegúrate de que la sección tenga una altura mínima */
        overflow: hidden; /* Evita el desbordamiento si es necesario */
        background-color: rgba(0, 0, 0, 0.5); /* Fondo negro con opacidad */
    }

    .text-container {
        margin-top: 200px; /* Ajusta este valor según sea necesario */
        position: relative; /* Asegura que el texto esté en el nivel superior */
        z-index: 1; /* Asegura que el texto esté por encima de la imagen */
    }
    </style>
</head>

<body>
    <?php include 'components/header.php'; ?>

      <!-- Sección de introducción -->
      <section class="intro-section bg-success text-white">
        <div class="background-image"></div> <!-- Imagen de fondo -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 text-container">
                    <h1>Acerca de Nosotros</h1>
                    <p class="justified-text">
                        Samuk SAC se especializa en la distribución y venta de tuberías y accesorios para diversas aplicaciones. Ofrecemos productos de PVC, HDPE, acero y otros materiales, así como conexiones, válvulas y juntas. Nos comprometemos a brindar asesoría técnica, soporte en selección de productos, y asistencia en instalación y mantenimiento. Con un enfoque en la calidad y el servicio postventa, garantizamos soluciones efectivas y duraderas para cada proyecto.
                    </p>
                </div>
                <div class="col-md-4">
                    <!-- Espacio para contenido adicional, si es necesario -->
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Misión y Visión -->
    <section class="container py-5 mission-vision">
        <div class="row text-center">
            <div class="col-lg-6">
                <h2 class="text-success"><i class="fas fa-eye"></i> Visión</h2>
                <p class="justified-text">
                    La visión de Samuk SAC es convertirse en la empresa líder en el mercado peruano de venta de accesorios y tuberías, reconocida por su excelencia en el servicio, innovación tecnológica, compromiso con la sostenibilidad, y como la mejor opción para sus clientes, colaboradores y proveedores.
                </p>
            </div>
            <div class="col-lg-6">
                <h2 class="text-success"><i class="fas fa-bullseye"></i> Misión</h2>
                <p class="justified-text">
                    La misión de Samuk SAC es brindar soluciones integrales en la venta de accesorios y tuberías a nuestros clientes, satisfaciendo sus necesidades de manera eficiente y oportuna, a través de un equipo altamente calificado y comprometido con la calidad, el desarrollo sostenible y la mejora continua.
                </p>
            </div>
        </div>
    </section>
    <br><br><br><br>
<!-- División de color verde -->
<div style="background-color: #198754; height: 10px;"></div>

<br><br><br>
    <!-- Sección de Centrándose en la calidad -->
    <section class="container py-5">
        <div class="row">
            <div class="col-md-6 factory-text">
                <h2 class="text-success">Centrándose en la Calidad</h2>
                <p class="justified-text">
                    SAM-UK trabaja constantemente para mejorar el rendimiento y la calidad de sus productos. En cuanto al rendimiento de sus productos, aumenta el equipamiento para tuberías y accesorios y añade más equipamiento auxiliar, como la mano robótica automática y el sistema de alimentación automático.
                </p>
                <p class="justified-text">
                    En cuanto a la calidad, existen varios pasos para comprobar y probar la calidad. Se construyeron laboratorios nacionales para reforzar este aspecto, para cada lote probamos de acuerdo con los estándares internacionales de muestreo. Nuestra visión es ser el principal fabricante de tuberías y accesorios. Como fabricante de tuberías de PVC, accesorios de CPVC y accesorios de PVC de China, producimos productos de calidad, mientras tanto, también brindamos servicios posventa. Practicamos para lograr nuestro valor: compartir juntos, ganar juntos, crecer juntos.
                </p>
            </div>
            <div class="col-md-6" style="margin-top: 65px;">
    <img src="assets/img_2.0/factory.webp" alt="Nuestra Fábrica" class="img-fluid">
</div>
        </div>
    </section>

   




<!-- Sección de Marcas -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Nuestra Oficina y Laboratorio</h1>
                <p class="text-long">Todos los productos SAM-Uk se fabrican en un entorno estrictamente controlado. Se procesan y supervisan durante todo el proceso de producción. Para garantizar la calidad del producto, se siguen varios métodos de inspección.</p>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 pb-5">
                <div class="h-100 img-container">
                    <a href="#"><img class="img-fluid brand-img" src="assets/img_2.0/8.jpg" alt="Marca 1"></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pb-5">
                <div class="h-100 img-container">
                    <a href="#"><img class="img-fluid brand-img" src="assets/img_2.0/9.jpg" alt="Marca 1"></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pb-5">
                <div class="h-100 img-container">
                    <a href="#"><img class="img-fluid brand-img" src="assets/img_2.0/5I8A5376.jpg" alt="Marca 1"></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pb-5">
                <div class="h-100 img-container">
                    <a href="#"><img class="img-fluid brand-img" src="assets/img_2.0/5I8A5377.jpg" alt="Marca 2"></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pb-5">
                <div class="h-100 img-container">
                    <a href="#"><img class="img-fluid brand-img" src="assets/img_2.0/5I8A5390.jpg" alt="Marca 3"></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pb-5">
                <div class="h-100 img-container">
                    <a href="#"><img class="img-fluid brand-img" src="assets/img_2.0/5I8A5394.jpg" alt="Marca 4"></a>
                </div>
            </div>
            <!-- Otras imágenes de marcas se pueden agregar aquí -->
        </div>
    </div>
</section>

<style>
.brand-img {
    transition: transform 0.3s ease; /* Animación suave para el efecto de hover */
}
.img-container:hover .brand-img {
    transform: scale(1.1); /* Aumenta el tamaño de la imagen al pasar el mouse */
}

</style>
    <!-- Sección de Servicios 
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Nuestros Servicios</h1>
                <p>Ofrecemos una amplia gama de servicios diseñados para apoyar cada etapa de sus proyectos.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Servicios de Entrega</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                    <h2 class="h5 mt-4 text-center">Envíos y Devoluciones</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                    <h2 class="h5 mt-4 text-center">Promociones</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                    <h2 class="h5 mt-4 text-center">Atención 24 Horas</h2>
                </div>
            </div>
        </div>
    </section>-->
    <?php include 'components/footer.php'; ?>

    <!-- Scripts -->
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>