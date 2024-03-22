<?php
include "../db.php";
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['name'])) {

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $student = getFind("students", $id);
        $update = "guncelle";
    }

}else{
    header('Location: ../index.php ');
}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Öğrenci Ekle</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="form-control mt-3 ">
        <form action="../save.php" method="post" class="form-control">
            <span class="section bg-warning">Öğrenci Form İşlemleri</span>
            <input type="hidden" name="id" value="<?php echo $student->id; ?>">
            <div class="item form-group mt-2">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Adı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="first_name" type="text" class="form-control col-md-7 col-xs-12" name="first_name"  value="<?php echo isset($student->first_name) ? $student->first_name : "" ?>"placeholder= "" required="required" >
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Adı<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last_name" name="last_name" value="<?php echo isset($student->last_name) ? $student->last_name : "" ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Öğrenci Numarası <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="student_number" name="student_number" value="<?php echo isset($student->student_number) ? $student->student_number :""?>"  required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group mt-2">
                <div class="col-md-6 col-md-offset-3">
                    <button id="send" type="submit"  name="<?php echo isset($update) ? $update : "save"?>" class="btn btn-success"><?php echo isset($update) ? "Güncelle": "Ekle" ?></button>
                </div>
            </div>
        </form>
    </div>
</div>


<link rel="stylesheet" href="../assets/js/bootstrap.min.js">
</body>
</html>
