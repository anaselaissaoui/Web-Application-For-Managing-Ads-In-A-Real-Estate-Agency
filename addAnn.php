<?php
include('dabase.php');
session_start();
if (isset($_SESSION['id_client'])) {

    $id_client = $_SESSION['id_client'];
}

// require "dabase.php";
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
                            if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {

                                echo "<li><a href='profile.php' class='text-decoration-none'><h6 class='text-white'>" . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "</h6></a></li></ul>";
                            } else {
                                echo "<h6 class='text-white'>Visitor</h6>";
                            }

                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <form method="POST" class="signin-form" enctype="multipart/form-data">
                        <div class="col-md-6 text-center mb-5">
                            <h2 class="heading-section">Add annonce</h2>
                        </div>
                        <!-- title -->
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title" name="title">
                        </div>
                        <!-- city -->
                        <div class="form-group">
                            <input type="text" name="city" class="form-control" placeholder="City">
                        </div>
                        <!-- adresse -->
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" placeholder="Address">

                        </div>
                        <!-- surface -->
                        <div class="form-group">
                            <input type="number" name="surface" class="form-control" placeholder="Surface">

                        </div>
                        <!-- price -->
                        <div class="form-group">
                            <input type="number" name="price" class="form-control" placeholder="Price">

                        </div>
                        <!-- offer date -->
                        <div class="form-group">
                            <input type="date" name="offDate" class="form-control" placeholder="Offer date">

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
                                <img id="preview1" src="" class="preview-image" />
                                <input type="file" class="upload-input" name="image1" onchange="previewImage(event, 'preview1')" />
                            </div>
                            <div class="dropzone">
                                <img id="preview2" src="" class="preview-image" />
                                <input type="file" class="upload-input" name="image2" onchange="previewImage(event, 'preview2')" />
                            </div>
                            <div class="dropzone">
                                <img id="preview3" src="" class="preview-image" />
                                <input type="file" class="upload-input" name="image3" onchange="previewImage(event, 'preview3')" />
                            </div>
                            <div class="dropzone">
                                <img id="preview4" src="" class="preview-image" />
                                <input type="file" class="upload-input" name="image4" onchange="previewImage(event, 'preview4')" />
                            </div>
                        </div>



                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                        <div class="form-group">
                            <button name="submit" class="form-control btn btn-success submit px-3">Add Annonce</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event, previewId, previewEnabled = true) {
    var input = event.target;
    var preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            if (previewEnabled) {
                preview.src = e.target.result;
            }
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = "";
    }
}
    </script>
</body>

<!-- SCRIPT PHP -->


<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $surface = $_POST['surface'];
    $offDate = $_POST['offDate'];
    $type = $_POST['type'];
    $category = $_POST['category'];







    if (!isset($title) || !isset($city) || !isset($address) 
    || !isset($price) || !isset($surface) || !isset($offDate) 
    || !isset($category) || !isset($type)|| $_FILES['image1']['error'] === UPLOAD_ERR_NO_FILE) {
        echo '**please enter all the values ....';
    } else {
        # IMAGES
        #image1
        $imagename1 = $_FILES['image1']['tmp_name'];
        $filename1 = $_FILES["image1"]["name"];
        $fileExtension1 = explode('.', $filename1);
        $fileExtension1 = end($fileExtension1);
        $filename11 = uniqid('', true) . ".$fileExtension1";
        $folder1 = "./img/" . $filename11;
        move_uploaded_file($imagename1, $folder1);;
        #image2
        if ($_FILES['image2']['name']) {
            $imagename2 = $_FILES['image2']['tmp_name'];
            $filename2 = $_FILES["image2"]["name"];
            $fileExtension2 = explode('.', $filename2);
            $fileExtension2 = end($fileExtension2);
            $filename22 = uniqid('', true) . ".$fileExtension2";
            $folder2 = "./img/" . $filename22;
            move_uploaded_file($imagename2, $folder2);
        }
        #image3 
        if ($_FILES['image3']['name']) {
            $imagename3 = $_FILES['image3']['tmp_name'];
            $filename3 = $_FILES["image3"]["name"];
            $fileExtension3 = explode('.', $filename3);
            $fileExtension3 = end($fileExtension3);
            $filename33 = uniqid('', true) . ".$fileExtension3";
            $folder3 = "./img/" . $filename33;
            move_uploaded_file($imagename3, $folder3);
        }
        #image4
        if ($_FILES['image4']['name']) {
            $imagename4 = $_FILES['image4']['tmp_name'];
            $filename4 = $_FILES["image4"]["name"];
            $fileExtension4 = explode('.', $filename4);
            $fileExtension4 = end($fileExtension4);
            $filename44 = uniqid('', true) . ".$fileExtension4";
            $folder4 = "./img/" . $filename44;
            move_uploaded_file($imagename4, $folder4);
        }


        $allowedExtensions = array('jpg', 'png', 'jpeg');
        if (!in_array($fileExtension1, $allowedExtensions) && !in_array($fileExtension2, $allowedExtensions) && !in_array($fileExtension3, $allowedExtensions) && !in_array($fileExtension4, $allowedExtensions)) {

            echo  "<span class='error-message'>Only JPG and PNG and JPEG Extensions are allowed!'</span>";
        }


        $sql = "INSERT INTO annonce (Title, Surface, City, Price, offerDate, id_client , Address, Category,  offerType, L_M_Date)
       VALUES('$title', '$surface','$city',  '$price', '$offDate', '$id_client', '$address' ,'$category', '$type', DATE_FORMAT(NOW(), '%Y-%m-%d'))";
        mysqli_query($conn, $sql);
        $id_annonce = mysqli_insert_id($conn); #get id from annonce table

        $sql2 = "INSERT INTO images (image, is_Principale, id_annonce) VALUES('" . $folder1 . "', TRUE, $id_annonce)";

        $hasImage = false;


        if ($_FILES['image2']['name']) {
            $sql2 .= ",('" . $folder2 . "', FALSE, $id_annonce)";
            $hasImage = true;
        }

        if ($_FILES['image3']['name']) {
            if ($hasImage) {
                $sql2 .= ",";
            }
            $sql2 .= "('" . $folder3 . "', FALSE, $id_annonce)";
            $hasImage = true;
        }

        if ($_FILES['image4']['name']) {
            if ($hasImage) {
                $sql2 .= ",";
            }
            $sql2 .= "('" . $folder4 . "', FALSE, $id_annonce)";
            $hasImage = true;
        }


        $sql2.= ";";

        mysqli_query($conn, $sql2); 
        echo "Added Successfully";
    }
   

}
?>














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
        height: 100px;
        border: 1px dashed #999;
        border-radius: 3px;
        text-align: center;
        margin: 6px 6px;
    }


    .preview-image {
        max-width:100%;
        height: 100%;
        object-fit:contain;
    }


    .upload-input {
        position: relative;
        top: -62px;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
    }
 
    .upload-input::after{
        display: none;
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