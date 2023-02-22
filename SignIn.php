<?php
session_start();
require "dabase.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
	<link rel="stylesheet" href="./style.css">
	<link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
	<title>Sign In</title>
</head>

<body>
<nav class="site-nav">
        <div class="site-navigation d-flex justify-content-between fixed-top py-3 px-5 align-items-center" style="background-color:#198754;">
            <a href="index.php" class="logo ms-4 rounded-circle bg-white"><img src="./img/logo.png" height="60px"></a>

            <ul class="js-clone-nav me-4 align-items-center d-flex text-center site-menu">
                <li class="justify-content-center me-4">
                    <ul class="list-unstyled ">
                        <li><img src="./img/visitorIcon.png" class="border border-3 rounded-circle" height="30px"></li>
                        <li>
							<?php
								if(isset($_SESSION['nom']) && isset($_SESSION['prenome'])){

									echo "<h6 class='text-white'>". $_SESSION['nom'] ." ". $_SESSION['prenome'] . "</h6>";
								}else{
									echo"<h6 class='text-white'>Visitor</h6>";

								}
								
							?>
                        </li>
                    </ul>
                </li>
                <li class="me-2"><button class="btn w-100 bg-white"><a href="./SignUp.php" class="text-success fw-bold text-decoration-none">Sign Up</a></button></li>            </ul>
        </div>
    </nav>



	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4">
				<div class="login-wrap p-0">

					<form action="" method="POST" class="signin-form">
						<div class="col-md-6 text-center mb-5">
							<h2 class="heading-section">Sign In</h2>
						</div>

						<div class="form-group">
							<input type="text" class="form-control" placeholder="email" name="email">
						</div>
						<div class="form-group">
							<input id="password-field" type="password" name="password" class="form-control" placeholder="Password">
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						</div>
						<?php

						if (isset($_SESSION['error'])) {
							echo $_SESSION['error'];
							unset($_SESSION['error']);
						}
						?>
						<div class="form-group">
							<button type="submit" name="submit" class="form-control btn btn-success submit px-3">Sign In</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>


<?php


if (isset($_POST['submit'])) {
	function validate($data)
	{

		$data = trim($data);

		$data = stripslashes($data);

		$data = htmlspecialchars($data);

		return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {

		// header("Location: signin.php?error=User Name is required");
		$_SESSION['error'] = "<div class='error'>*Your Email is required.</div>";
	} else if (empty($pass)) {

		// header("Location: signin.php?error=Password is required");
		$_SESSION['error'] = "<div class='error'>*Password is required.</div>";
	} else {
		$sql = "SELECT * FROM `client` WHERE Email='$email' AND Password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

			if ($row['Email'] === $email && $row['Password'] === $pass) {
				
				$_SESSION['nom'] = $row['Name'];

				$_SESSION['prenome'] = $row['LName'];

				$_SESSION['id_client'] = $row['id_client'];

				// echo $_SESSION['nom'];
				// echo $_SESSION['prenome'];
				// echo $_SESSION['id_client'];

				header("Location: index.php");
				// header("Location: signin.php");



			} else {
				// header("Location: signin.php?error=Incorect User name or password");
				$_SESSION['error'] = "<div class='error'>*Incorect email or password.</div>";
			}
		} else {

			// header("Location: signin.php?error=Incorect User name or password");
			$_SESSION['error'] = "<div class='error'>*Incorect email or password.</div>";
		}
	}
}
// else{
// 	header("Location: signin.php");
// 	exit();
// }


?>







<style>
	body {
		background: url('./img/background-sign-in.jpg');
		background-size: cover;
	}

	form.signin-form {
		background-color: #c5c5c5d6;
		padding: 100px 33px;
		width: 144%;
		height: 31rem;
		border-radius: 17px;
		text-align: -webkit-center;
		margin: 40% -20% 0%;
	}

	h2.heading-section {
		color: #6c6c6c;
	}


	input.form-control {
		margin: 35px 0px 35px 0px;
		background-color: #ffffffe0;
		padding: 8px 18px;
	}

	button.form-control.btn.btn-primary.submit.px-3 {
		background-color: #be9327;
		border: none;
		margin: 18px 0px 20px 0px;
	}

	.error {
		color: red;
		border-radius: 4px;
		width: 100%;
		text-align: start;
		margin: 0px 6px;
		font-size: 12px;
	}
</style>
