<?php 
    include '../conection/conection.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TicketOax</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <link rel="stylesheet" href="../styles/style.css">

        <style>
            input[type="password"], input[type="email"] {
                border: none;
                border-radius: 12px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 20px 15px;
                background-color: #FFFFFF;
                width: 60%;
                display: block;
                margin: 0px auto 0px;
            }

            .form-control:focus {
                box-shadow: 0 0 0 0.2rem rgba(109, 160, 237, 0.25);
                border-color: #6DA0ED;
            }

            label {
                color: #465772;
                display: block;
                margin-bottom: 0px;
                font-size: 20px;
            }

            .bg-form {
                padding: 10px 30px 10px;
                border-radius: 20px;
                background-color: #d6e1f7;
                max-width: 500px;
                margin: 20px auto 30px;
            }

            .btn-primary{
                background-color: #6DA0ED;
                border-radius: 20px;
                padding: 10px 60px;
            }

            @media (max-width: 768px) {
                .bg-form {
                    padding: 0px;
                    margin-top: 10px;
                    max-width: 90%;
                    border-radius: 10px;
                }

                .btn {
                    width: 100%;
                    margin: 10px 0;
                }
                input[type="password"], input[type="email"] {
                    border-radius: 10px;
                    width: 100%;
                    margin: 10px 0;
                    background-color: #FFFFFF;
                }

                .btn-primary {
                    font-size: 16px;
                    border-radius: 15px;
                }

                label {
                    font-size: 14px;
                }
            }
        </style>
    </head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/images/logoTicket.png" alt="" style="width: 200px;">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                style="border-color: rgba(255,255,255,0.1);">
                <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath stroke=\'rgba(255, 255, 255, 1)\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' d=\'M4 7h22M4 15h22M4 23h22\'/%3E%3C/svg%3E');"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../index.php" style="color: white;">INICIO</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../contact.php" style="color: white;">CONTACTO</a>
                    </li>
                    <?php
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    ?>
                    <a class="mx-3" href="<?php echo isset($_SESSION['user_id']) ? 'user.php' : 'auth/login.php'; ?>">
                        <img style="width: 45px;" src="../assets/images/user.png" alt="Perfil del usuario">
                    </a>
                </ul>
            </div>
        </div>
    </nav>

    <div id="mensaje"></div>
    <h4 class="mt-5 text-center">CAMBIAR CONTRASEÑA</h4>
    <div class="container text-center bg-form  mx-auto"  style="max-width: 60%">   
        <div class="p-3" >
            <form action="procesar_cambio_contrasena.php" method="POST" id="formulario">
                <div class="form-group mt-3">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="contrasena_nueva">Contraseña nueva</label>
                    <input type="password" class="form-control" id="contrasena_nueva" name="contrasena_nueva" required>
                </div>
                <div class="form-group">
                    <label for="confirmar_contrasena">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" required>
                </div>
                <button class=" btn btn-primary" type="submit" name="cambiar_contrasena">
                    <span id="spinner" style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>        
                    Aceptar
                </button>
            </form>
        </div>
    </div>

    <footer style="position: fixed; bottom: 0; width:100%; height: 45px;" class="mt-4">
        <a href="https://www.facebook.com/autobuseshalconoficial?mibextid=ZbWKwL" target="_blank">
            <img src="../assets/images/icon-facebook-480.png" width="30px" alt="">
        </a>
        <a href="https://www.instagram.com/autobuseshalcon_oax?igsh=ZThic29ra2pkcW85" target="_blank">
            <img src="../assets/images/icon-instagram-480.png" width="30px" alt="">
        </a>
    </footer>

    <script>
        document.getElementById('formulario').onsubmit = function(event) {
            event.preventDefault();
            document.getElementById('spinner').style.display = 'inline-block';
            
            var formData = new FormData(this);
            fetch('procesar_cambio_contrasena.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('spinner').style.display = 'none';
                alert(data);
                if (!data.includes('Error: ')) {
                    window.location.href = '../index.php';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('spinner').style.display = 'none';
            });
        };
    </script>
</body>
</html>