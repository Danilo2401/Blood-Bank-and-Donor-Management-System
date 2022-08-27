<?php

require "admin_data.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood+</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style-admin.css">
</head>
<body>

    <div class="container form-style">
        <div class="d-flex justify-content-center">
            <div class="mt-3 text-center">
                <h1 class="display-1">Welcome admin!</h1>
                <p class="display-6">Please log in.</p>
            <div class="col-9 mx-auto">
            <i class="fa-solid fa-user-tie"></i>
                <form  method="POST" action="admin.php">
                    <div class="mb-3">
                        <label for="name_admin" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name_admin" name="name_admin" aria-describedby="name_admin">
                    </div>
                    <div class="mb-4">
                        <label for="password_admin" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password_admin" name="password_admin">
                    </div>
                    <button type="submit"  id="login" name="login" class="text-light btn btn-admin w-25">Log in</button>
                </form>
            </div>
            </div>
            
        </div>
    </div>

    <div class="container text-center">
    <div id="message">
        <?php
            if(isset($_POST["login"])){
                require_once "admin_data.php";
                $user = new Admin();
                $user->LogIn($_POST["name_admin"],$_POST["password_admin"]);
            }
        ?>
    </div>
    </div>

<script>

let message = document.querySelector("#message");

message.addEventListener("click",function(){
    message.style.display = "none";
});

</script>
    
    
</body>
</html>