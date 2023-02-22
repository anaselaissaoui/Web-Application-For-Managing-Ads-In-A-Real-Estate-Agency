


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Singnup</title>
</head>
<body>
<form htmlspecialchars method="post" enctype="multipart/form-data" action="./insert.php">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        <div class="col">
        <div class="form-outline">
            <input type="text" id="form6Example1" name="Name" class="form-control" />
            <label class="form-label" for="form6Example1" >First name</label>
        </div>
        </div>
        <div class="col">
        <div class="form-outline">
            <input type="text" id="form6Example2" class="form-control"name="LName" />
            <label class="form-label" for="form6Example2" name>Last name</label>
        </div>
        </div>
    </div>
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" id="form6Example5" class="form-control" name="Email" />
        <label class="form-label" for="form6Example5">Email</label>
    </div>

    <!-- Number input -->
    <div class="form-outline mb-4">
        <input type="number" id="form6Example6" class="form-control" name="Phone"/>
        <label class="form-label" for="form6Example6">Phone</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
            <input type="password" id="registerPassword" class="form-control" name="Password"/>
            <label class="form-label" for="registerPassword">Password</label>
        </div>

        <!-- Repeat Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="registerRepeatPassword" class="form-control" name="Confirm_Password"/>
            <label class="form-label" for="registerRepeatPassword">Confirm-Password</label>
        </div>


    <!-- Submit button -->
    <button type="submit" name="send" class="btn btn-primary btn-block mb-4">Place order</button>
</form>
    
</body>
</html>