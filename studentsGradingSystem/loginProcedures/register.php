<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5 d-flex justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">Kayıt Ol</div>
                <div class="card-body">
                    <form action="../save.php" method="post">
                        <div class="form-group">
                            <label for="name">Ad</label>
                            <input type="text" class="form-control" id="name"  name="name"  placeholder="Ad Soyad Giriniz">
                        </div>
                        <div class="form-group">
                            <label for="name">Soyad</label>
                            <input type="text" class="form-control" id="name"  name="surname"  placeholder="Soyad Giriniz">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"  placeholder="E-posta Adresi Giriniz">
                        </div>
                        <div class="form-group">
                            <label for="password">Şifre</label>
                            <input type="password" class="form-control" id="password" name="password"  placeholder="Şifre giriniz">
                        </div>
                        <button type="submit" name="register" class="btn btn-primary mt-2 btn-block">Kayit Ol</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="../assets/js/bootstrap.min.js">
</body>
</html>
