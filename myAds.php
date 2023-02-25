<?php
require "dabase.php";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="./style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <title>My Ads</title>
</head>

<body>
  <?php session_start();
  // Check if the user is logged in
  if (!isset($_SESSION['id_client'])) {
    // Redirect the user to the login page
    header("Location: ./SignIn.php");
    exit;
  }
  ?>

  <nav class="site-nav">
    <div class="site-navigation d-flex justify-content-between fixed-top py-3 px-5 align-items-center" style="background-color:#198754;">
      <a href="index.php" class="logo ms-4 rounded-circle bg-white"><img src="./img/logo.png" height="60px"></a>

      <ul class="js-clone-nav me-4 align-items-center d-flex text-center site-menu list-unstyled">

        <li class='me-2'><button class='btn w-100 bg-white'><a href='./SignOut.php' class='text-success fw-bold text-decoration-none'>Log Out</a></button></li>
      </ul>
    </div>
  </nav>


  <div class="container-fluid cont">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="./profile.php">
                <span data-feather="home" class="align-text-bottom"></span>
                My Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./myAds.php">
                <span data-feather="file" class="align-text-bottom"></span>
                My Ads
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto d-lg-block col-lg-10">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-5 pb-2 border-bottom">
          <h1 class="h2 mb-2 pt-4">Dashboard</h1>
        </div>
        <div class="content mt-5 pt-1">
          <div class="container mt-5">
            <div class="row py-5">
              <div class="col-lg-12 col-md-12">
                <div class="header d-flex justify-content-between">
                  <h4 class="title">My Ads</h4>
                  <button class='btn bg-success'><a href='./AddAnn.php' class='text-white fw-bold text-decoration-none'>New Ad</a></button>
                </div>
                <div class="content">
                  <?php

                  // Check for any database connection errors
                  if ($conn->connect_error) {
                    die("Connection failed: " . mysqli_connect_error());
                  }


                  // Get the user's information from the database
                  $query = "SELECT a.*, i.image 
                            FROM annonce a
                            INNER JOIN images i ON a.id_annonce = i.id_annonce 
                            WHERE a.id_client={$_SESSION['id_client']} AND i.is_principale = 1";
                  $query_run = mysqli_query($conn, $query);
                  echo " <div class='container-xxl py-5'>";
                  echo   "<div class='container'>";
                  echo   "<div class='tab-content'>";
                  echo   "<div id='tab-1' class='tab-pane d-flex fade show p-0 active'>";
                  echo   "<div class='row  g-4'>";


                  while ($row = mysqli_fetch_assoc($query_run)) {
                    echo  "<div class='col-lg-4 col-md-6 wow fadeInUp' data-wow-delay='0.1s'>
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
                                                <p><i class='fa fa-ruler-combined text-success me-2'></i>" . $row['Surface'] . " M²</p>
                                            </div>
                                            <div class='d-flex border-top'>
                                                <small class='flex-fill text-center border-end py-2'><button name='edit' class='btn btn-success'><a href='./editAd.php?id=".$row['id_annonce']."'>Edit</a></button></small>
                                                <small class='flex-fill text-center border-end py-2'><button name='delete' class='btn btn-danger'><a href='./deleteAd.php?id=".$row['id_annonce']."'>Delete</a></button></small>
                                            </div>
                                        </div>
                                    </div>
                                ";
                }
                echo "</div></div></div></div></div>";

                  // Close the database connection
                  $conn->close();
                  ?>
                  

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

  </main>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script>
    // Get the input fields and update button
    const inputs = document.querySelectorAll('input');
    const updateBtn = document.getElementById('update-btn');
    const saveBtn = document.getElementById('save-btn');

    // Disable the input fields by default
    inputs.forEach(input => {
      input.disabled = true;
    });

    // Enable the input fields when the user clicks the update button
    updateBtn.addEventListener('click', () => {
      inputs.forEach(input => {
        input.disabled = false;
      });
      updateBtn.style.display = 'none';
      saveBtn.style.display = 'inline-block';
    });
  </script>


</body>

</html>

<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }
</style>