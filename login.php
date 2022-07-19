<?php session_unset(); 
	  include("admin/conexion.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>HABITA INMUEBLE | Venta, compra y alquiler de Inmuebles</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
<meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" href="" sizes="180x180" />
    <link rel="icon" href="favicon.png" sizes="32x32" type="image/png" />
    <link rel="icon" href="favicon.png" sizes="16x16" type="image/png" />
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#563d7c" />
    <link rel="icon" href="favicon.ico" />
    <meta name="theme-color" content="#563d7c" />
    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@getbootstrap" />
    <meta name="twitter:creator" content="@getbootstrap" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="bootstrap-social-logo.png" />
    <!-- Facebook -->
    <meta property="og:url" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="bootstrap-social.png" />
    <meta property="og:image:secure_url" content="bootstrap-social.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <!-- google analytics -->

    <!-- Google fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Merriweather:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    <!-- CSS bootstrap -->
    <link
      rel="stylesheet"
      href="assets/bootstrap-4.4.1-dist/css/bootstrap.css"
    />
    <!-- CSS custom -->
    <link rel="stylesheet" href="css/styles.css" />
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
</head>
<body>		
    <!-- navbar -->
    <nav
      id="navbar"
      class="navbar navbar-expand-xl navbar-light bg-white position-sticky"
    >
      <?php include("php/nav.php"); ?>
    </nav>
    
	<div class="limiter">
		<div class="container-login100" style="background-image: url('login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="php/i.login.php">
					<span class="login100-form-title p-b-53">
						Bienvenido
					</span>

					<!-- a href="#" class="btn-face m-b-20"><i class="fa fa-facebook-official"></i></a>
					<a href="#" class="btn-google m-b-20"><img src="login/images/icons/icon-google.png"></a-->
					<br><br>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
						<span class="focus-input100"></span>
					</div>
					<br><br>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="clave" name="clave" placeholder="Password">
						<span class="focus-input100"></span>
					</div>				
					
					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" >INGRESAR</button>
					</div>
				</form>
					<div class="w-full text-center p-t-55">
						<span style="color: #000000" class="txt2">
							Nuevo usuario?
						</span>

						<a href="register.php" class="txt2 bo1">
							Registrate aquí
						</a>
						
						<br><br>
						<span style="color: #000000" class="txt2">
							Olvidaste tu clave
						</span>

						<a href="forget.php" class="txt2 bo1">
							Click aquí
						</a>
						
						<br><br>
						<span style="font-family: 'Lato', sans-serif;font-size: 14px;line-height: 17px;color: #848484" class="txt2">
							Registrandote en esta página web aceptas los <span style="color: #0642AB">Terminos y condiciones</span> y las <span style="color: #0642AB" class="txt2">Politicas de privacidad</span>
						</span>																		
					</div>								
				
			</div>
		</div>
	</div>
	
    <!-- Footer Section Begin -->
    	<?php include("php/footer.php"); ?>
    <!-- Footer Section End -->	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>	
<!--===============================================================================================-->	
    <!-- Javascript bootstrap -->    
    <script src="assets/bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>

    <!-- Javascript custom -->
    <script src="js/menu.js"></script>	
</body>
</html>