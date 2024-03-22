<?php require_once '../db.php';

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['name'])) {


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
    <title>Not Hesaplama</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <div class="form-control">
            <h2>Öğrenci Not Ortalaması Hesaplama</h2>
            <form method="post" class="form-control">
                <label for="gradeAverage">Kaç Dersin Notunu Gireceksiniz?</label>
                <input type="number" id="gradeAverage" name="gradeAverage" min="1" required><br><br>

                <?php
                if (isset($_POST['gradeAverage'])) {
                    $grade_count = $_POST['gradeAverage'];

                    for ($i = 1; $i <= $grade_count; $i++) {
                        echo "<label for='grade{$i}'>{$i}. Ders Notu:</label>";
                        echo "<input type='number' id='grade{$i}' name='grades[]' min='0' max='100' required>";

                        echo "<label for='weight{$i}'>Ağırlık:</label>";
                        echo "<input type='number' id='weight{$i}' name='weights[]' min='0' max='1' step='0.01' required><br><br>";
                    }

                    echo "<input type='submit' value='Hesapla'>";
                }
                ?>
            </form>

            <?php
            if (isset($_POST['grades']) && isset($_POST['weights'])) {
                $grades = $_POST['grades'];
                $weights = $_POST['weights'];

                if (count($grades) !== count($weights)) {
                    echo "Not ve ağırlık sayıları eşleşmiyor!";
                    exit;
                }

                $total_weight = array_sum($weights);
                $weighted_sum = 0;

                for ($i = 0; $i < count($grades); $i++) {
                    $weighted_sum += $grades[$i] * $weights[$i];
                }

                $average = $weighted_sum / $total_weight;

                echo "<h3>Öğrencinin Not Ortalaması: $average</h3>";
            }
            ?>
        </div>
    </div>


<link rel="stylesheet" href="../assets/js/bootstrap.min.js">
</body>
</html>
