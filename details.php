<?php
session_start();
require "dabase.php";
$Id = $_GET['id_annonce'];

$query = "SELECT a.*, i.image, c.PhoneN, i.is_Principale
FROM annonce a 
INNER JOIN images i ON a.id_annonce = i.id_annonce
INNER JOIN client c ON a.id_client = c.id_client
WHERE a.id_annonce = $Id 
 ORDER BY i.is_Principale DESC";
$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {

    $images = array(); // create an array to store the image URLs

    foreach ($query_run as $row) {
        $Title = $row['Title'];
        $Surface = $row['Surface'];
        $Address = $row['Address'];
        $City = $row['City'];
        $Price = $row['Price'];
        $principale = $row['is_Principale'];
        $OfferDate = $row["offerDate"];
        $OfferType = $row['offerType'];
        $PhoneN = $row['PhoneN'];
        $Category = $row['Category'];
        $images[] = $row['image']; // add each image URL to the array
    }
}

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
                            if (isset($_SESSION['nom']) && isset($_SESSION['prenome'])) {

                                echo "<li><a href='profile.php' class='text-decoration-none'><h6 class='text-white'>" . $_SESSION['nom'] . " " . $_SESSION['prenome'] . "</h6></a></li></ul>";
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
    
    <div class="container car d-flex justify-content-center w-75">
        <div id="carouselExampleControlsNoTouching" class="carousel slide carousel-fade w-75" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                foreach ($images as $index => $image) {
                    if ($index == 0) {
                        echo '<div class="carousel-item w-100 active">';
                    } else {
                        echo '<div class="carousel-item w-100">';
                    }
                    echo '<img src="' . $image . '" class="d-block w-100"  style="height:400px;" alt="Image ' . ($index + 1) . '">';
                    echo '</div>';
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-12">
                        <h2 class="heading text-primary"><?php echo $Title; ?></h2>

                        <div class="fs-4 mb-3 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pin-map me-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"></path>
                                <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"></path>
                            </svg>
                            <?php echo $Address .", ".$City; ?>
                        </div>



                        <div class="fs-4 mb-3 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-houses-fill me-2" viewBox="0 0 16 16">
                                <path d="M7.207 1a1 1 0 0 0-1.414 0L.146 6.646a.5.5 0 0 0 .708.708L1 7.207V12.5A1.5 1.5 0 0 0 2.5 14h.55a2.51 2.51 0 0 1-.05-.5V9.415a1.5 1.5 0 0 1-.56-2.475l5.353-5.354L7.207 1Z"></path>
                                <path d="M8.793 2a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Z"></path>
                            </svg>
                            <?php echo $Category ?>
                        </div>

                        <div class="fs-4 mb-3 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-currency-dollar me-2" viewBox="0 0 16 16">
                                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                            </svg>
                            <?php echo $Price ?>
                        </div>


                        <div class="fs-4 mb-3 d-flex align-items-center">
                            <button type="button" id="contactInfos" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone me-2" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                </svg>
                                Contact the advertiser
                            </button>

                            <p class="text-success fw-bold ms-2" id="contactNumber" style="display: none"><?php echo $PhoneN; ?></p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const contactInfos = document.getElementById('contactInfos');
        const contactNumber = document.getElementById('contactNumber');

        contactInfos.addEventListener('click', () => {
            contactInfos.style.display = 'none';
            contactNumber.style.display = 'block';
        });
    </script>
</body>

</html>