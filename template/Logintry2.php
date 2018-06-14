<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Bine ai venit!
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Parola">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Log in
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Ai uitat 
						</span>
						<a class="txt2" href="#">
							Email / Parola?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="signup_index.html">
							Nu ai inca un cont?
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
	
	
	<?php
session_start();
require_once("drawinpixels.php");
 
//  verifica daca exista date transmise
if //($_POST['login_username'] != '' && $_POST['login_parola'] != '') {
 
    // preia datele din formular
    $username = $_POST['login_username'];
    $parola = md5($_POST['login_parola']);
 
    // formeaza si executa query-ul de select din baza de date
    $query = "SELECT * FROM `users` WHERE `Username` = '".$username."' AND `Parola` = '".$parola."'";
    $result = mysqli_query($conexiune, $query) or die ( "Error : ". mysqli_error($query) );
 
    // verifica daca interogarea MySQL a gasit date valide
    if ($result || mysqli_num_rows($result) < 1) {
        // daca nu, afiseaza un mesaj de eroare
        echo "Datele introduse sunt incorecte<br>
            Click <a href='index.php'>aici</a> pentru a reveni la pagina de login";
    } else {
    
        // salveaza username-ul si parola in sesiune
        $_SESSION['username'] = $username;
        $_SESSION['parola'] = $parola;
 
        // afiseaza un mesaj de succes        
        echo "Autentificarea a fost efectuata cu succes.";
    }
}
?>

</body>
</html>
