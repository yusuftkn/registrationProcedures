<?php
require_once '../save.php';

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['name'])) {


    $grades = getTable("grades");


    foreach ($grades as $grade) {
        $weight1 = 0.4;
        $weight2 = 0.6;
        $grade1 = $grade->grade;
        $grade2 = $grade->grade2;

        $gradeAverage = $grade1 * $weight1 + $grade2 * $weight2;

        update("grades", ["gradeAverage"], [$gradeAverage], $grade->id);
    }

    $grades = getTable("grades");


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
    <title>Öğrenci Listsi</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body class="card-body">
<?php

echo "<div class='container'>";
    echo "<table class='table table-sm'> <br> <br>";
        echo "<div>";
                echo "<thead>";
                echo "<tr>
                              <th scope='col'>#</th>
                              <th scope='col'>Öğrenci No</th>
                              <th scope='col'>Ders Adı</th>
                              <th scope='col'>Dönem</th>
                              <th scope='col'>Not1</th>
                              <th scope='col'>Not2</th>
                              <th scope='col'>Not Ortalaması</th>
                              <th scope='col'>Sil</th>
                              <th scope='col'>Güncelle</th>
                              <th scope='col'><a href='gradeCount.php'>Not Hesapla</a></th>
                              <th><a href='add_grade.php'>Ekle</a></th>
                        </tr>";
                echo "</thead>";
        echo "<div>";
        echo "<div>";
                    echo '<tbody>';
                    if (count($grades ) > 0 )
                    {
                        foreach ($grades as $grade)
                        {
                            echo "<tr>";
                            echo "<td> $grade->id</td>";
                            echo "<td> $grade->student_number</td>";
                            echo "<td> $grade->course_name</td>";
                            echo "<td> $grade->semester</td>";
                            echo "<td> $grade->grade</td>";
                            echo "<td> $grade->grade2</td>";
                            echo "<td>$grade->gradeAverage</td>";
                            echo "<td><a href='../save.php?table=grades&delete=".$grade->id."&redirect=crud/gradeTables.php'>Sil</a> </td>";
                            echo "<td><a href='add_grade.php?id=".$grade->id."'>Düzenle</a></td>";
                            echo "</tr>";
                        }

                    }else
                    {
                        echo   "<h3>Sonuç Bulunamadı</h3>";

                    }

                    echo '</tbody>';

                            echo "</div>";
                        echo "</table>";
                    echo "</div>";


?>

<link rel="stylesheet" href="../assets/js/bootstrap.min.js">
</body>
</html>
