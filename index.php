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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
    <title>UrbanVisions</title>
</head>


<body>
    <nav class="site-nav">
        <div class="site-navigation d-flex justify-content-between fixed-top py-3 px-5 align-items-center" style="background-color:#198754;">
            <a href="index.php" class="logo ms-4 rounded-circle bg-white"><img src="./img/logo.png" height="60px"></a>

            <ul class="js-clone-nav me-4 align-items-center d-flex text-center site-menu">
                <li class="justify-content-center me-4">
                    <ul class="list-unstyled">
                        <li><img src="./img/visitorIcon.png" class="border border-3 rounded-circle" height="30px"></li>
                        <?php
                        if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {

                            echo "<li><a href='profile.php' class='text-decoration-none'><h6 class='text-white'>" . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "</h6></a></li></ul>";
                        } else {
                            echo "<li><h6 class='text-white'>Visitor</h6></ul>";

                            echo "<li class='me-2'><button class='btn w-100 bg-white'><a href='./SignUp.php' class='text-success fw-bold text-decoration-none'>Sign Up</a></button></li>";
                            echo "<li><button class='btn w-100 bg-white'><a href='./SignIn.php' class='text-success fw-bold text-decoration-none'>Sign In</a></button></li>";
                        }



                        ?>

                </li>
            </ul>
            </li>
            </ul>
        </div>
    </nav>

    <div class="hero">
        <div class="hero-slide">
            <div class="img overlay" style="background-image: url('img/bg-hero.jpg')"></div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12 text-center">
                    <h1 class="heading" data-aos="fade-up">
                        UrbanVisions
                    </h1>
                    <h2 class="subheading">Easiest Way To Find Your dream Home</h2>
                    <form action="#" method="post" class="narrow-w form-search d-flex justify-content-center align-items-center mb-3" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="200">
                        <div class="row g-2 justify-content-center">
                            <div class="col-md-3">
                                <input type="text" class="form-control border-0" name="City" placeholder="City">
                            </div>
                            <div class="col-md-2">
                                <input name="min_price" type="text" class="form-control border-0 search-slt" placeholder="Min-Price">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="max_price" class="form-control border-0 search-slt" placeholder="Max-Price">
                            </div>
                            <div class="col-md-3">
                                <select name="type" class="form-control form-select border-0">
                                    <option value="" disabled selected>Sale/Rental</option>
                                    <option value="Sale">Sale</option>
                                    <option value="Rental">Rental</option>
                                </select>
                            </div>

                            <div class="col-md-2 mb-3">
                                <select name="category" class="form-control form-select border-0">
                                    <option value="" disabled selected>Property Type</option>
                                    <option value="House">House</option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Villa">Villa</option>
                                </select>
                            </div>
                            <div class="col-md-4 text-center">
                                <button class=" btn border-0 w-100 bg-success py-3" name="Submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="justify-content-center align-items-center">
                <div class="col-lg-12 text-center">
                    <form class="narrow-w form-search d-flex justify-content-center align-items-center mb-5" action="" method="post">
                        <div class="col-lg-3 col-md-6 col-sm-12 p-0 my-5">
                            <button type="submit" class="btn bg-secondary text-white" name="sort_by" value="Price">Sort By Price</button>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 p-0 my-5">
                            <button type="submit" class="btn bg-secondary text-white" name="sort_by" value="offerDate">Sort By Date</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php



    if (isset($_POST['Submit'])) {
        // Get the search terms from the form
        $city = mysqli_real_escape_string($conn, $_POST['City']);


        // Build the SQL query
        $query = "SELECT  a.*, i.image 
    FROM annonce a 
    INNER JOIN images i ON a.id_annonce = i.id_annonce 
    WHERE i.is_principale = 1";
        if (!empty($city)) {
            $query .= " AND City = '{$city}'";
        }
        if (!empty($_POST['category'])) {
            $category = $_POST['category'];
            $query .= " AND Category = '{$category}'";
        }
        if (!empty($_POST['type'])) {
            $Type = $_POST['type'];
            $query .= " AND offerType = '{$Type}'";
        }
        if (isset($_POST['sort_by'])) {
            $sorting = $_POST['sort_by'];
            $fquery .= "  ORDER BY $sorting";
        }

        // Execute the query
        $query_run = mysqli_query($conn, $query);
        echo " <div class='container-xxl py-5 mt-5'>";
        echo   "<div class='container'>";
        echo   "<div class='tab-content'>";
        echo   "<div id='tab-1' class='tab-pane d-flex fade show p-0 active'>";
        echo   "<div class='row  g-4'>";
        // Display the search results
        while ($row = mysqli_fetch_assoc($query_run)) {
            echo  "<div class='col-lg-4 col-md-6 wow fadeInUp mt-5' data-wow-delay='0.1s'>
                                <div class='property-item rounded overflow-hidden'>
                                    <div class='position-relative overflow-hidden'>
                                        <a href='details.php?id_annonce=" . $row['id_annonce'] . "'><img class='img-fluid' src=" . $row['image'] . " alt=''></a>
                                        <div class='bg-success rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3'>For " . $row['offerType'] . "</div>
                                        <div class='bg-white rounded-top text-success position-absolute start-0 bottom-0 mx-4 pt-1 px-3'>" . $row['Category'] . "</div>
                                    </div>
                                    <div class='p-4 pb-0'>
                                        <h5 class='text-success mb-3'>" . $row['Price'] . "$</h5>
                                        <a class='d-block h5 mb-2 text-decoration-none' href='details.php?id_annonce=" . $row['id_annonce'] . "'>" . $row['Title'] . "</a>
                                        <p><i class='fa fa-map-marker-alt text-success me-2'></i>" . $row['Address'] . "," . $row['City'] . "</p>
                                    </div>
                                    <div class='d-flex border-top'>
                                        <small class='flex-fill text-center border-end py-2'><i class='fa fa-ruler-combined text-success me-2'></i>" . $row['Surface'] . " M²</small>
                                    </div>
                                </div>
                            </div>
                        ";
        }
        echo "</div></div></div></div></div>";
    } else {
        $query = "SELECT * FROM annonce a 
    INNER JOIN images i ON a.id_annonce = i.id_annonce 
    WHERE i.is_principale = 1";
        $query_run = mysqli_query($conn, $query);
        echo " <div class='container-xxl py-5 mt-5'>";
        echo   "<div class='container'>";
        echo   "<div class='tab-content'>";
        echo   "<div id='tab-1' class='tab-pane fade show p-0 active'>";
        echo   "<div class='row  g-4'>";
        while ($row = mysqli_fetch_array($query_run)) {
            echo  "<div class='col-lg-4 col-md-6 wow fadeInUp mt-5' data-wow-delay='0.1s'>
            <div class='property-item rounded overflow-hidden'>
                <div class='position-relative overflow-hidden'>
                    <a href='details.php?id_annonce=" . $row['id_annonce'] . "'><img class='img-fluid' src=" . $row['image'] . " alt=''></a>
                    <div class='bg-success rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3'>For " . $row['offerType'] . "</div>
                    <div class='bg-white rounded-top text-success position-absolute start-0 bottom-0 mx-4 pt-1 px-3'>" . $row['Category'] . "</div>
                </div>
                <div class='p-4 pb-0'>
                    <h5 class='text-success mb-3'>" . $row['Price'] . "$</h5>
                    <a class='d-block h5 mb-2 text-decoration-none' href='details.php?id_annonce=" . $row['id_annonce'] . "'>" . $row['Title'] . "</a>
                    <p><i class='fa fa-map-marker-alt text-success me-2'></i>" . $row['Address'] . ", " . $row['City'] . "</p>
                </div>
                <div class='d-flex border-top'>
                    <small class='flex-fill text-center border-end py-2'><i class='fa fa-ruler-combined text-success me-2'></i>" . $row['Surface'] . " M²</small>
                </div>
            </div>
        </div>";
        }
        echo "</div></div></div></div></div>";
    };

    ?>

</body>

</html>