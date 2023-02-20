<?php
require "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
	<link rel="stylesheet" href="./style.css">
	<link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <title>Add annonce</title>
</head>
<body>
<div class="container">
			<div class="row justify-content-center">
				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	
		      	<form action="" method="POST" class="signin-form">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">Add annonce</h2>
					</div>

                    <!-- title -->

		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Title" name="title">
		      		</div>

                    <!-- city -->
                    <div class="form-group">
                       <input type="text" name="city" class="form-control" placeholder="City" >
                      
                    </div>
                    <!-- adresse -->
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Address" >
                    
                    </div>
                    <!-- surface -->
                    <div class="form-group">
                        <input type="number" name="surface" class="form-control" placeholder="Surface" >
                    
                    </div>
                    
                    <!-- price -->
                    <div class="form-group">
                        <input type="number" name="price" class="form-control" placeholder="Price" >
                    
                    </div>

                    <!-- off date -->
                    <div class="form-group">
                        <input type="date" name="offDate" class="form-control" placeholder="Offer date" >
                    
                    </div>

                    <!-- limm date -->
                    <div class="form-group">
                        <input type="date" name="l_m_date" class="form-control" placeholder="Limite date" >
                    
                    </div>


                    <!-- category -->
                    <div class="form-group">
                        <select name="category" class="form-control form-select border-0 py-3">
                            <option value="" disabled selected>Property Type</option>
                            <option value="House">House</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Villa">Villa</option>
                        </select>
                    
                    </div>

                    <!-- type offer -->

                    <div class="form-group">
                        <select name="type" class="form-control form-select border-0 py-3">
                            <option value="" disabled selected>Sale/Rental</option>
                            <option value="Sale">Sale</option>
                            <option value="Rental">Rental</option>
                        </select>
                    
                    </div>
				









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

<style>
    body{	
        background: url('./img/background-sign-in.jpg');
        background-size: cover;
    }
    form.signin-form {
        background-color: #c5c5c5d6;
        padding: 100px 33px;
        width: 144%;
        /* height: 31rem; */
        border-radius: 17px;
        text-align: -webkit-center;
        margin: 20% -20%;
    }
    h2.heading-section {
        color: #6c6c6c;
    }


</style>