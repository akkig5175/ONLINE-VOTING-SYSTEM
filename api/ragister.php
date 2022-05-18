<?php
    include("connect.php");
    $name = $_POST['name'];
    $mobile = $_POST['number'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $Address = $_POST['Address'];
    $image = $_FILES['Photo']['name'];
    $tmp_name = $_FILES['Photo']['tmp_name'];
    $role = $_POST['role'];


    if($password == $cpassword){
        move_uploaded_file($tmp_name, "../uploads/$image");
        $mobile = $_POST['number'];
        $insert = mysqli_query($connect , "INSERT INTO user (name, mobile, address, password, Photo, role, status, votes) VALUES ('$name', '$mobile','$Address','$password', '$image' , '$role', 0 , 0)");
        if($insert){
            echo '
            <script>
                alert("Registration Successfull!");
                window.location = "../route/register.html";
            </script>
            ';
        }
        else{
            echo '
            <script>
                alert("Some error occured!");
                window.location = "../route/register.html";
            </script>
            ';

        }
    }
    else{
       echo '
       <script>
            alert("password and confirm password does not match");
            window.location = "../route/register.html";
       </script>
       ';
    }
?>