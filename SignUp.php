<?php
require "dabase.php";
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $LName  = $_POST['LName'];
    $Name = $_POST['Name'];
    $Email  = $_POST['Email'];
    $PhoneN = $_POST['Phone'];
    $Password  = md5($_POST['Password']);
    $Confirm_Password  = md5($_POST['Confirm_Password']);
    $error = '';

	if (empty($LName) || empty($Name) || empty($Email) || empty($PhoneN) || empty($Password) || empty($Confirm_Password)) {
		$error = 'Please enter all the values';
	} elseif ($Password !== $Confirm_Password) {
		$error = 'Passwords do not match';
	} elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
		$error = 'Invalid email format';
	} else {
		$select = "SELECT * FROM client WHERE Email = '$Email'";
		$q = mysqli_query($conn, $select);
		if (mysqli_num_rows($q) > 0) {
			$error = 'Email already exists in the database';
		} else {
			// Sanitize input data
			// $LName = mysqli_real_escape_string($conn, $LName);
			// $Name = mysqli_real_escape_string($conn, $Name);
			// $Email = mysqli_real_escape_string($conn, $Email);
			// $PhoneN = mysqli_real_escape_string($conn, $PhoneN);
	
			// Insert data into the database
			$insert = "INSERT INTO client (LName, Name, PhoneN, Email, Password) 
					   VALUES ('$LName', '$Name', '$PhoneN', '$Email', '$Password')";
			$q = mysqli_query($conn, $insert);
	
			// Check if the insertion was successful
			if (!$q) {
				$error = 'Error inserting data into the database: ' . mysqli_error($conn);
			}
		}
	}
	
	
}
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
                            <h6 class="text-white">Visitor</h6>
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
							<h2 class="heading-section">Sign Up</h2>
						</div>

						<div class="form-group">
                            <input type="text" id="form6Example1" name="Name" class="form-control" placeholder="First Name"/>
						</div>

						<div class="form-group">
                            <input type="text" id="form6Example2" class="form-control"name="LName" placeholder="Last Name" />
						</div>
                        <div class="form-group">
                            <input type="number" id="form6Example6" class="form-control" name="Phone" placeholder="Number"/>
                        </div>
                        
						<div class="form-group">
                            <input type="email" id="form6Example5" class="form-control" name="Email" placeholder="Email" />
						</div>
						<div class="form-group">
                            <input type="password" id="registerPassword" class="form-control" name="Password" placeholder="Password"/>
						</div>
						<div class="form-group">
                            <input type="password" id="registerRepeatPassword" class="form-control" name="Confirm_Password" placeholder="Confirm Your Password "/>
						</div>


						
						<?php
						
						if(isset($error)){
							echo "<p class='para' style='color: red;'>" . $error . "</p>";
						 }
						 
						 
						?>

						<div class="form-group">
                        <button type="submit" name="send" class="form-control btn btn-success submit px-3">Sign Up</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>



<style>
	body {
		background: url('./img/background-sign-in.jpg');
		background-size: cover;
	}

	form.signin-form {
    background-color: #c5c5c5d6;
    padding: 100px 33px;
    width: 144%;
    height: 46rem;
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