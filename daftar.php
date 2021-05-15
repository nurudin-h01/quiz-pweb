<?php 
require 'config.php';
$test = FALSE;

if (isset ($_POST['daftar']) ) {
    if(strlen($_POST['FullName']) == 0){
        exit('Nama harus diisi');
    }else{
        if(strlen($_POST['Username']) == 0){
            exit('Username harus diisi');
        }else{
            if(strlen($_POST['Password']) == 0){
                exit('Password harus diisi');
            }else{
                $test = TRUE;
            }
        }
    }
}

if($test === TRUE){

    $username = mysqli_query($conn, "SELECT * FROM data_pengguna WHERE Username = '$_POST[Username]' " );
    if(mysqli_fetch_assoc($username)){
        $message = 'data sudah ada';
        // $result = $conn->query("SELECT * FROM data_pengguna WHERE Username = '$_POST[Username]' ");
        // $arrayResult = mysqli_fetch_array($result);
        // echo $arrayResult['Full_Name'] ;
    }else{
        $query = "INSERT INTO data_pengguna (Full_Name, Username, Password) VALUES ('$_POST[FullName]', '$_POST[Username]', '$_POST[Password]')";
        $sql = mysqli_query($conn, $query);
        if ($sql){
            $message = 'data berhasil ditambah';
        }else {
            $message = 'error';
        } 
    }
    
  
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <style>
        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }
        
        .card-signin {
            border: 0;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }
        
        .card-signin .card-title {
            margin-bottom: 2rem;
            font-weight: 300;
            font-size: 1.5rem;
        }
        
        .card-signin .card-body {
            padding: 2rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center" style="font-weight: bold;">Daftar</h5>
                        <form class="form-signin" action="" method="POST">
                            <?php if(!empty($message)): ?>
                                <div class="alert alert-success">
                                    <?= $message; ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-label-group">
                                <label for="inputEmail">Nama Lengkap</label>
                                <input type="text" id="inputText" class="form-control" style="border-radius: 10px;" placeholder="Nama Lengkap" name="FullName">

                            </div>
                            <div class="form-label-group mt-2">
                                <label for="inputEmail">Username</label>
                                <input type="text" id="inputText" class="form-control" style="border-radius: 10px;" placeholder="Username" name="Username">

                            </div>


                            <div class="form-label-group mt-2">
                                <label for="inputPassword">Password</label>
                                <input type="password" id="inputPassword" class="form-control" style="border-radius: 10px;" placeholder="Password" name="Password">

                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase mt-3" style="width: 100%;" type="submit" name="daftar">Daftar</button>
                            <div>
                                <h6 for="akun" class="mt-4 text-center" style="font-weight: normal;">Sudah punya akun?<a href="index.php">Login</a></h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>