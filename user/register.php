<?php
require_once "../src/includes.php";

if (isset($_SESSION['response'])){
    $response = $_SESSION['response'];
}
/**
 * @var ../src/class/database/Database $database
 */
$database;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/assets/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="/assets/login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="/assets/login/images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" action="register_action.php" method="post">
					<span class="login100-form-title">
						Bine ai venit!
					</span>
                <?php
                if (isset($response['success']) && $response['success'] == false){
                    foreach ($response['error'] as $error){
                        echo "<p>".$error."</p>";
                    }
                }
                ?>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email" value="<?php echo isset($response['userData']['email'])?$response['userData']['email']:'' ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Nume utilizator is required: exabcxyz">
                    <input class="input100" type="text" name="username" placeholder="Nume utilizator" value="<?php echo isset($response['userData']['username'])?$response['userData']['username']:'' ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Parola">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="check_password" placeholder="Confirmare Parola">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign up
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
                    <a class="txt2" href="#">
                        Ai deja cont?
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/assets/login/vendor/bootstrap/js/popper.js"></script>
<script src="/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/assets/login/vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="/assets/login/js/main.js"></script>

</body>
</html>