<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    
</head>
<body>
<?php
include '../db.php';

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['name'])) {

    $students = getTable("students");

}else{
    header('Location: ../index.php ');
}



    echo "<div class='container mt-4'>";
        echo  "<div class='row'>";
            echo "<table class='table table-sm'> <br> <br>";
                echo "<thead>";
                echo "<tr>
                              <th scope='col'>#</th>
                              <th scope='col'>Öğrenci Adı</th>
                              <th scope='col'>Öğrenci Soyadı</th>
                              <th scope='col'>Öğrenci Numarası</th>
                              <th scope='col'>Sil</th>
                              <th scope='col'>Güncelle</th>
                              <th><a href='add_students.php'>Ekle</a></th>
                         </tr>";
                echo "</thead>";
                echo '<tbody>';
                if (count( $students ) > 0 )
                {
                    foreach ($students as $student)
                    {
                        echo "<tr>";
                        echo "<td> $student->id</td>";
                        echo "<td> $student->first_name</td>";
                        echo "<td> $student->last_name</td>";
                        echo "<td> $student->student_number</td>";
                        echo "<td><a href='../save.php?table=students&delete=".$student->id."&redirect=crud/studentTable.php.'>Sil</a> </td>";
                        echo "<td><a href='add_students.php?id=".$student->id."'>Düzenle</a> </td>";
                        echo "</tr>";
                    }

                }else
                {
                    echo   "<h3>Sonuç Bulunamadı</h3>";

                }

                echo '</tbody>';
            echo "</table>";
        echo "</div>";
    echo  '</div>';

    ?>

    <link rel="stylesheet" href="../assets/js/bootstrap.min.js">
</body>
</html>