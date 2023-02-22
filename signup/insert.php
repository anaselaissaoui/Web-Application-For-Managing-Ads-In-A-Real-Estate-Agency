<?php 
    include('config.php');
    if (isset($_POST['send'])) {
    $LName  = $_POST['LName'];
    $Name = $_POST['Name'];
    $Email  = $_POST['Email'];
    $PhoneN = $_POST['Phone'];
    $Password  = md5($_POST['Password'];) 
    $Confirm_Password  = md5($_POST['Confirm_Password'];)
    

    if ($_POST["Password"] !== $_POST["Confirm_Password"]) {
            } else {
            $Password  == $Confirm_Password ;
            }
            $insert = "INSERT INTO client  (LName , Name, PhoneN, Email , Password ) VALUES ('$LName', '$Name' , ' $PhoneN' , '$Email' , '$Password')";
            $q = mysqli_query($connect ,$insert);  #connect database + enter data to database
            if ($q) {
                echo "YES";
            }
            else{
                echo "NO";
            }
        }
        
?>