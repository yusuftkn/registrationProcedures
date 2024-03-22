<?php
include "db.php";

/*if (isset($_POST["marka_kayit"]))
{
    $table = "markalar";
    $sutunNames = ["marka_ad","marka_durum"];
    $values = [$_POST["marka_ad"], $_POST["marka_durum"]];

    insert($table, $sutunNames, $values);
    return redirect("brandTable.php");
}*/

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $tableName = "users";
    $sutunNames = ["name","surname","email","password"];
    $values =
        [
            $_POST["name"],
            $_POST["surname"],
            $_POST["email"],
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];

    insert($tableName, $sutunNames, $values);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Location: index.php');
    } else {
        echo "Error: Unable to register.";
    }
}



if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST["send"])){
        $tableName = "grades";
        $sutunNames = ["student_number","course_name","semester","grade", "grade2"];
        $values =
            [
                $_POST["student_number"],
                $_POST["course_name"],
                $_POST["semester"],
                $_POST["grade"],
                $_POST["grade2"],
            ];

        insert($tableName, $sutunNames, $values);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "Başarılı";
            header('location: crud/gradeTables.php');
        } else {
            echo "Error: Unable to register.";
        }
    }elseif (isset($_POST["save"])){
        $tableName = "students";
        $sutunNames = ["first_name","last_name","student_number"];
        $values =
            [
                $_POST["first_name"],
                $_POST["last_name"],
                $_POST["student_number"]
            ];
        insert($tableName,$sutunNames, $values);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "Kayıt Eklendi";
            header('location: crud/studentTable.php');
        }else{
            echo "Error: Kayıt Başarısız.";
        }
    }

}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {

    $tableName = "grades";
    $columnNames = ["student_number","course_name","semester","grade","grade2","gradeAverage"];
    $values =
        [
            $_POST["student_number"],
            $_POST["course_name"],
            $_POST["semester"],
            $_POST["grade"],
            $_POST["grade2"],
            $_POST["gradeAverage"]
        ];

    update($tableName, $columnNames, $values, $_POST["id"]);

    return redirect("crud/gradeTables.php");

}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guncelle"]))
{
    $tableName = "students";
    $columnNames = ["first_name","last_name","student_number"];
    $values =
        [
            $_POST["first_name"],
            $_POST["last_name"],
            $_POST["student_number"]
        ];

    update($tableName, $columnNames , $values, $_POST["id"]);

    return redirect("crud/studentTable.php");
}


if (isset($_GET["delete"]))
{
    $id= $_GET["delete"];
    $table= $_GET["table"];
    $url = $_GET["redirect"];
    delete($table, $id);
    redirect($url);
}




