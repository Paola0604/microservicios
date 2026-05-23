<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/><!-- Load fonts style after rendering the layout styles -->
    <!-- CSS -->
    <link href="assets/css/cssheader.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/cssLoginyRegis.css" rel="stylesheet" type="text/css"/>
    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
</head>

<body>
     <?php include 'components/header.php'; ?>


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Contacto</h1>
            <p>
                  Estamos aquí para acompañarte en todo lo que necesites. Si tienes preguntas, sugerencias o simplemente deseas hablar con nosotros, no dudes en contactarnos. ¡Estaremos encantados de ayudarte!
            </p>
        </div>
    </div>

    <!-- Start Map -->
   
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d153220.4765889127!2d-71.60174893215633!3d-16.448885021519313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424af8e3ce0a4d%3A0x7cf82ce617474e4d!2sSAMUK%20S.A.C!5e1!3m2!1ses!2spe!4v1730129309560!5m2!1ses!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <script>
        var mymap = L.map('mapid').setView([-23.013104, -43.394365, 13], 13);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Samuk Telmplte | Template Design by <a href="https://templatemo.com/">Templatemo</a> | Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery Â© <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);

        L.marker([-23.013104, -43.394365, 13]).addTo(mymap)
            .bindPopup("<b>Zay</b> eCommerce Template<br />Location.").openPopup();

        mymap.scrollWheelZoom.disable();
        mymap.touchZoom.disable();
    </script>
    <!-- Ena Map -->

<!-- Inicio Contacto -->     
<div class="container py-5">         
    <div class="row py-5">             
     <form id="contactForm" class="col-md-9 m-auto" method="post" action="DAO/Contacto/procesar_contacto.php" role="form">               
            <div class="row">                     
                <div class="form-group col-md-6 mb-3">                         
                    <label for="inputname">Nombre</label>                         
                    <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Nombre">                     
                </div>                     
                <div class="form-group col-md-6 mb-3">                         
                    <label for="inputemail">Correo Electrónico</label>                         
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Correo Electrónico">                     
                </div>                 
            </div>                 
            <div class="mb-3">                     
                <label for="inputsubject">Asunto</label>                     
                <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Asunto">                 
            </div>                 
            <div class="mb-3">                     
                <label for="inputmessage">Mensaje</label>                     
                <textarea class="form-control mt-1" id="message" name="message" placeholder="Mensaje" rows="8"></textarea>                 
            </div>                 
            <div class="row">                     
                <div class="col text-end mt-2">                         
                    <button type="submit" class="btn btn-success btn-lg px-3">Enviar</button>                     
                </div>                 
            </div>             
        </form>         
    </div>     
</div>     

<!-- Fin Contacto -->
 
<!-- Modal de confirmación -->
<div id="modalConfirmacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Confirmación</h5>
               
            </div>
            <div class="modal-body">
                <p id="modalMensaje"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closeModal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

    

     <?php include 'components/footer.php'; ?>


    <!-- Start Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-OmbkLGqZHvBOgN6PjmMxK7HF1Mx4wJ3n8RQeOvf6O+McoSQuX58NNZJjRlbnz9Pbz5ufBLZ/V1NTaFIRGIC+GA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
     <script src="assets/js_2.0/LoginyRegistro.js"></script>
<script>
document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita el envío del formulario tradicional

    const formData = new FormData(this); // Recoge los datos del formulario

    fetch('DAO/Contacto/procesar_contacto.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Mostrar un mensaje de confirmación
        if (data.trim() === "¡Mensaje enviado correctamente!") {
            document.getElementById('modalMensaje').innerText = "¡Tu mensaje ha sido enviado correctamente!"; // Mensaje de éxito
        } else {
            document.getElementById('modalMensaje').innerText = "Error al enviar el mensaje. Por favor, intenta de nuevo."; // Mensaje de error
        }
        $('#modalConfirmacion').modal('show'); // Muestra el modal usando Bootstrap
         // Limpiar el formulario
        this.reset(); // Resetea el formulario
    })
    .catch(error => {
        console.error('Error:', error);
    });

    // Cerrar el modal
    document.getElementById('closeModal').addEventListener('click', function() {
        $('#modalConfirmacion').modal('hide'); // Oculta el modal usando Bootstrap
    });
});
</script>
    <!-- End Script -->
</body>

</html>