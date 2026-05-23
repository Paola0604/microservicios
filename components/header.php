<?php
require "Conexion/conexion.php";


if ($_POST) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
 
    $sql = "SELECT id, password, nombre, tipo_usuario FROM usuarios WHERE usuario='$usuario'"; 
    $resultado = $conn->query($sql);
    $num = $resultado->num_rows;    

    if ($num > 0) {
        $row = $resultado->fetch_assoc();
        $password_bd = $row['password'];
        $pass_c = sha1($password);

        if ($password_bd == $pass_c) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

            header("Location: Administrador/indexAdmin.php");
            exit(); // Asegúrate de salir después de una redirección
        } else {
            echo "La contraseña no coincide";
        }
    } else {
        echo "NO EXISTE USUARIO";
    }
}
?>


<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between align-items-center">
            <!-- Left Side: Social Media Icons -->
            <div class="d-flex align-items-center">
                <a class="text-light me-3 fs-4" href="https://fb.com/templatemo" target="_blank" rel="sponsored">
                    <i class="fab fa-facebook "></i>
                </a>
                <a class="text-light me-3 fs-4" href="https://www.instagram.com/" target="_blank">
                    <i class="fab fa-instagram "></i>
                </a>
                <a class="text-light fs-4" href="https://www.tiktok.com/" target="_blank">
                    <i class="fab fa-tiktok "></i>
                </a>
            </div>
            <!-- Center: Store Message -->
            <div class="text-center flex-grow-1">
                <span>¡Bienvenido a Nuestra Tienda! Tu tienda única para todas tus necesidades.</span>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->



<!-- Header -->
<!-- time running -->

<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.jsp">
            Samuk
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
               
                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="#" id="openModal">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                  
                </a>
            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->
<!-- MODAL DEL REGISTRO Y INICIO SESION -->
<div class="overlay" id="overlay"></div>
   <div class="modal-container" id="modalContainer">
         <div class="modal-close" id="modalClose">&times;</div> <!-- Botón de cierre -->
       <div class="container-form">
           <form class="sign-in" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <h2>Iniciar Sesión</h2>
                <div class="social-networks">
                    <ion-icon name="logo-twitch"></ion-icon>
                    <ion-icon name="logo-twitter"></ion-icon>
                    <ion-icon name="logo-instagram"></ion-icon>
                    <ion-icon name="logo-tiktok"></ion-icon>
                </div>
                <span>Use su correo y contraseña</span>
                <div class="container-input">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" placeholder="Email" name="usuario">
                </div>
                <div class="container-input">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" placeholder="Password" name="password">
                </div>
                <a href="#">¿Olvidaste tu contraseña?</a>
                <button class="button">INICIAR SESIÓN</button>
            </form>
        </div>

     <div class="container-form">
    <form class="sign-up" method="POST" action="">
        <h2>Registrarse</h2>
        <div class="social-networks">
            <ion-icon name="logo-twitch"></ion-icon>
            <ion-icon name="logo-twitter"></ion-icon>
            <ion-icon name="logo-instagram"></ion-icon>
            <ion-icon name="logo-tiktok"></ion-icon>
        </div>
        <span>Use su correo electrónico para registrarse</span>
        <div class="container-input">
            <ion-icon name="person-outline"></ion-icon>
            <input type="text" name="nombre" placeholder="Nombre" required>
        </div>
        <div class="container-input">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="container-input">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="button">REGISTRARSE</button>
    </form>
</div>

        <div class="container-welcome">
            <div class="welcome-sign-up welcome">
                <h3>¡Bienvenido!</h3>
                <p>Ingrese sus datos personales para usar todas las funciones del sitio</p>
                <button class="button" id="btn-sign-up">Registrarse</button>
            </div>
            <div class="welcome-sign-in welcome">
                <h3>¡Hola!</h3>
                <p>Regístrese con sus datos personales para usar todas las funciones del sitio</p>
                <button class="button" id="btn-sign-in">Iniciar Sesión</button>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

