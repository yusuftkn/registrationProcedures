<?php
//session_start();
//if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
//    header('Location: process.php');
//}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oturum Aç</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container my-5 d-flex justify-content-center">

    <div class="col-5">
        <div class="card">
            <div class="card-header"><h2>Kullanıcı Giriş</h2></div>
            <div class="card-body">
                <form action="loginProcedures/login.php" method="post">
                    <?php  if (isset($_GET['error'])){ ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"  placeholder="E-posta">
                        <div></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre</label>
                        <input type="password" class="form-control" id="password"  name="password" placeholder="Şifre">
                        <div></div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 btn-block">Giriş Yap</button>
                </form>
                <div class="link-secondary">
                    <p>Hesabınız Yok Mu? <a href="loginProcedures/register.php">Kayıt Ol</a> </p>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="assets/js/bootstrap.min.js">
</body>
</html>











<!--<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="bg-secondary form-control">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-4 col-8" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Kullanıcı Kayıt</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Kullanıcı Kayıt Formu</h6>
                        <p class="card-text">lütfen kayıt olun.</p>
                        <a href="register.php" class="card-link form-control btn-primary">Kayıt Ol</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mt-4 col-4" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Kullanıcı Giriş</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Giriş İşlemi</h6>
                        <p class="card-text">Kullanıcı Girişi İçin Oturum Açınız.</p>
                        <a href="login.php" class="card-link form-control btn-primary">Oturum aç</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

<link rel="stylesheet" href="assets/js/bootstrap.min.js">
</body>
</html>
-->