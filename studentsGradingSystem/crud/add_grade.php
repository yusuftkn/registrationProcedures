<?php
include '../db.php';
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
    
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $grade = getFind("grades", $id);
        $update = "update";
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
    <title>Öğrenci Notu Ekle</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="form-control mt-3 ">
        <form action="../save.php" method="post" class="form-control">
            <span class="section bg-warning">Öğrenci Form</span>
            <input type="hidden" name="id" value="<?php echo $grade->id; ?>">
            <div class="item form-group mt-2">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Öğrenci Numarası <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="student_number" type="text" class="form-control col-md-7 col-xs-12"  name="student_number" value="<?php echo isset($grade->student_number) ? $grade->student_number : ""?>" placeholder= "" required="required" >
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Ders Ad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="course_name" name="course_name" value="<?php echo isset($grade->course_name) ? $grade->course_name : ""  ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Dönem <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="semester" name="semester" value="<?php echo isset($grade->semester) ? $grade->semester : "" ?>"  required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Not1<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="grade" name="grade" value="<?php echo isset($grade->grade) ? $grade->grade : ""?>" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Not2<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="grade2" name="grade2" value="<?php echo isset($grade->grade) ? $grade->grade2 : ""?>" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="item form-group">
                <label  hidden class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Not Ortalaması<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" id="gradeAverage" name="gradeAverage" value="<?php echo isset($grade->grade) ? $grade->gradeAverage : ""?>"  data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="item form-group">
                <label  hidden class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Not Ortalaması<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" id="gradeAverage" name="gradeAverage" value="<?php echo isset($grade->grade) ? $grade->gradeAverage : ""?>"  data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group mt-2">
                <div class="col-md-6 col-md-offsubmitset-3">
                    <button id="send" type=submit" name="<?php echo isset($update) ? $update : "send" ?>" class="btn btn-success"><?php echo isset($update) ? "Güncelle" : "Ekle" ?></button>
                </div>
            </div>
        </form>

    </div>
</div>

<link rel="stylesheet" href="../assets/js/bootstrap.min.js">
</body>
</html>