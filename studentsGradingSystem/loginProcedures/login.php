<?php
session_start();
include '../db.php';

if (isset($_POST['email']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)){
        header("location: ../index.php?error=Kullanıcı email is required");
        exit();
    }elseif (empty($password)){
        header("location: ../index.php?error=Password is required");
    }else{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $pdo =connection();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                header('Location: process.php');
            } else {
                echo "Invalid email or password";
                header('Location: ../index.php');
            }
        }
    }
}










?>
/*//session_start();
//if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
//    header('Location: process.php');
//}
?><!--
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
                <div class="card-header">Kullanıcı Giriş Sayfası</div>
                <div class="card-body">
                    <form action="login_process.php" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="E-posta">
                            <div></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Şifre</label>
                            <input type="password" class="form-control" id="password"  name="password" required placeholder="Şifre">
                            <div></div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 btn-block">Giriş Yap</button>
                    </form>
                    <div class="link-secondary">
                        <p>Hesabınız Mu? <a href="register.php">Kayıt Ol</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="assets/js/bootstrap.min.js">
</body>
</html>
-->