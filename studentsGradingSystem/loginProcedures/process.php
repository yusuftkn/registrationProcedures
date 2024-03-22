<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['name'])) {


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-4 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title bg-secondary"> Öğrenci Kayıt İşlemleri </h5>
                        <p class="card-text"> Öğrenci Kayıt Listesini Görüntüle </p>
                        <a href="../crud/studentTable.php" class="btn btn-primary">Git</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title bg-secondary">Öğrenci Not Kayıt İşlemleri</h5>
                        <p class="card-text">Öğrenci Not Kayıt Listesini Görüntüle</p>
                        <a href="../crud/gradeTables.php" class="btn btn-primary">Git</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mb-3 mt-4 mb-sm-0">
                <div class="d-grid gap-2">
                    <button class="btn btn-dark" type=""><a href="logout.php"><h5>Çıkış</h5></a></button>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="../assets/js/bootstrap.min.js">
</body>
</html>
<?php
}else{
    header('Location: ../index.php ');
}
?>