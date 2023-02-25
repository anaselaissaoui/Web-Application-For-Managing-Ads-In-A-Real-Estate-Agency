<?php
require "dabase.php";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Profile</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home" class="align-text-bottom"></span>
                My Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./myAds.php">
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
                <div class="header">
                  <h4 class="title">Edit Profile</h4>
                </div>
                <div class="content">
                  <?php

                  // Check for any database connection errors
                  if ($conn->connect_error) {
                    die("Connection failed: " . mysqli_connect_error());
                  }

                  if (isset($_POST['submit'])) {
                    // User input
                    $name = filter_var($_POST['Name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $last_name = filter_var($_POST['LName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $PhoneNumber = filter_var($_POST['PhoneN'], FILTER_SANITIZE_NUMBER_INT);

                    // Get the user's information from the database
                    $query = "SELECT * FROM client WHERE id_client = {$_SESSION['id_client']}";
                    $query_run = mysqli_query($conn, $query);

                    // Fetch the user's information from the result set
                    if ($query_run !== false && $query_run->num_rows > 0) {
                      $user_info = $query_run->fetch_assoc();

                      // Update the user's information in the database
                      $query = "UPDATE client SET LName = '" . ($last_name != '' ? $last_name : $user_info['LName']) . "',Name = '" . ($name != '' ? $name : $user_info['Name']) . "', PhoneN = '" . ($PhoneNumber != '' ? $PhoneNumber : $user_info['PhoneN']) . "'
         WHERE id_client = {$_SESSION['id_client']}";
                      if ($conn->query($query) === TRUE) {
                        echo "Record updated successfully";
                      } else {
                        echo "Error updating record: " . $conn->error;
                      }

                      $success_message = 'Your profile has been updated.';
                    } else {
                      // Handle any errors
                      echo "Error fetching user information: " . $conn->connect_error;
                    }
                  }



                  // Get the user's information from the database
                  $query = "SELECT * FROM client WHERE id_client= {$_SESSION['id_client']}";
                  $query_run = $conn->query($query);

                  // Fetch the user's information from the result set
                  if ($query_run !== false && $query_run->num_rows > 0) {
                    $user_info = $query_run->fetch_assoc();
                  } else {
                    // Handle any errors
                    echo "Error fetching user information: " . $conn->connect_error;
                  }

                  // Close the database connection
                  $conn->close();
                  ?>
                  <form action="" method="post">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="LName" class="form-control border-input toEdit" placeholder="<?php echo $user_info['LName']; ?>" value="" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="Name" class="form-control border-input toEdit" placeholder="<?php echo $user_info['Name']; ?>" value="" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="Email" class="form-control border-input" placeholder="<?php echo $user_info['Email']; ?>" value="" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Phone number</label>
                          <input type="tel" name="PhoneN" class="form-control border-input toEdit" placeholder="<?php echo $user_info['PhoneN']; ?>" value="" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="mt-5">
                      <button type="button" id="update-btn" class="btn btn-secondary btn-fill btn-wd">Update Profile</button>
                      <button type="submit" name="submit" id="save-btn" class="btn btn-secondary btn-fill btn-wd" style="display: none;">Update Profile</button>
                      <button class='btn  bg-danger'><a href='./deleteAcc.php' class='text-white fw-bold text-decoration-none'>Delete Account</a></button>
                    </div>
                  </form>


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
    const inputs = document.querySelectorAll('.toEdit');
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