
<?php
session_start();
if(isset($_SESSION['id_client'])){

    $id_client = $_SESSION['id_client'] ;
}
include('dabase.php');
// require "dabase.php";
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
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form  method="POST" class="signin-form" enctype="multipart/form-data">
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
                    <!-- images -->
                    <div class="form-group">    
                        <div class="dropzone">
                            <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                            <input type="file" class="upload-input" name="image1" />
                        </div>
                        <div class="dropzone">
                        <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                            <input type="file" class="upload-input" name="image2" />
                        </div>
                        <div class="dropzone">
                        <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                            <input type="file" class="upload-input" name="image3" />
                            
                           
                        </div>
                        <div class="dropzone">
                        <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                            <input type="file" class="upload-input" name="image4" />
                        </div>
                    </div>
				
                    <?php 
						if(isset($_SESSION['error'])){
							echo $_SESSION['error'];
							unset($_SESSION['error']);
						}
					?>
	            <div class="form-group">
	            	<button  name="submit" class="form-control btn btn-success submit px-3">Add Annonce</button>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>  
</body>

                            <!-- SCRIPT PHP -->


 <?php
 if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $price = $_POST['price'];
        $surface = $_POST['surface'];
        $offDate = $_POST['offDate'];
        $category = $_POST['category'];
        $type = $_POST['type'];
        # IMAGES
        $IMAGE1 = $_FILES['image1'];
        $image_location1 = $_FILES['image1']['tmp_name'];
        $image_name1= $_FILES['image1']['name'];
        $image_up1 = "img/".$image_name1;

        $IMAGE2 = $_FILES['image2'];
        $image_location2 = $_FILES['image2']['tmp_name'];
        $image_name2= $_FILES['image2']['name'];
        $image_up2 = "img/".$image_name2;

        $IMAGE3 = $_FILES['image3'];
        $image_location3 = $_FILES['image3']['tmp_name'];
        $image_name3= $_FILES['image3']['name'];
        $image_up3 = "img/".$image_name3;

        $IMAGE4 = $_FILES['image4'];
        $image_location4 = $_FILES['image4']['tmp_name'];
        $image_name4= $_FILES['image4']['name'];
        $image_up4 = "img/".$image_name4;





    if (!isset($title) || !isset($city)||!isset($address) || !isset($price) || !isset($surface) || !isset($offDate) || !isset($category) || !isset($type)|| !isset($IMAGE1)) {
       echo '**please enter all the values ....';
   }
   
    else {
       $sql1 = "INSERT INTO annonce(Title, Surface, City, Price, offerDate, id_client , Address, Category,  offerType)
       VALUES('$title', '$surface','$city',  '$price', '$offDate', '$id_client', '$address' ,'$category', '$type')";
        mysqli_query($conn, $sql1);

        $id_annonce = mysqli_insert_id($conn); #get id from annonce table

        $sql2 = "INSERT INTO images(image, is_Principale, id_annonce)
        VALUES('$image_up1', TRUE, $id_annonce),
        ('$image_up2', FALSE,$id_annonce),
        ('$image_up3', FALSE, $id_annonce),
        ('$image_up4', FALSE, $id_annonce)
        ";
         mysqli_query($conn, $sql2);

        if (move_uploaded_file($image_location1,'img/'.$image_name1)) {
            echo "<script>alert('Product uploaded successfully')</script>";
        }

    }
    header('location: addAnn.php');  # return page addAnn.php
    
}
?>














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
    .form-group {
    display: flex;
    flex-direction: row;
    justify-content: center;
}


.dropzone {
    width: 100px;
    height: 80px;
    border: 1px dashed #999;
    border-radius: 3px;
    text-align: center;
    margin: 6px 6px;
}

.upload-icon {
	margin: 25px 2px 2px 2px;
}

.upload-input {
	position: relative;
	top: -62px;
	left: 0;
	width: 100%;
	height: 100%;
	opacity: 0;
}
.dropzone.col-md-3 {
    margin: 0px 3px;
    background-color: #f0f0f0;
}
.form-group.col-md-12 {
    display: flex;
    flex-direction: revert;
    margin: 29px 7px 13px 11px;
}
input.form-control {
    margin: 11px 0px 11px 0px;
    background-color: #ffffffe0;
    padding: 8px 18px;
}
select.form-control.form-select.border-0.py-3 {
    margin: 11px 0px 11px 0px;
    background-color: #ffffffe0;
    padding: 8px 18px;
}

</style>
