<?php
/*$host = 'localhost';
$dbname = 'students_grading_system';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}*/
include 'helper.php';

/**
 * @return PDO
 */
function connection()
{
    try {
        $db = new PDO("mysql:host=localhost;charset=utf8;dbname=students_grading_system", "root", "root");

    } catch (Exception $exception) {
        echo $exception->getMessage("veri tabanına bağlanma hatası");
    }

    return $db;
}


/**
 * @param $table
 * @return array|false
 */
function getTable($table = null)
{
    $pdo = connection();
    $db = $pdo->query("select * from $table")->fetchAll(PDO::FETCH_OBJ);

    return $db;
}


/**
 * @param $table
 * @param $id
 * @return mixed
 */
function getFind($table = null, $id = null)
{
    $pdo = connection();

    $get = $pdo->query("select * from $table where id = $id")->fetch(PDO::FETCH_OBJ);

    return $get;
}

/**
 * @param string $tableName
 * @param array $sutunNames
 * @param array $values
 * @return void
 */
function insert($tableName, array $sutunNames, array $values)
{
    try {
        $sutuns = implode(",", $sutunNames);
        $options = [];

        $argumants = array_map(function ($sutun) use ($options) {
            return $options[] = "?";
        }, $sutunNames);

        $argumant = implode(",", $argumants);

        $pdo = connection();
        $sorgu = $pdo->prepare("INSERT INTO $tableName($sutuns) VALUES($argumant)");
        $sorgu->execute($values);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }


}


/**
 * @param $table
 * @param $id
 * @return void
 */
function delete($table, $id)
{

    if ($_GET) {

        $pdo = connection();

        $sql = $pdo->prepare("delete from $table where id = ?");

        $item = $sql->execute([
            $id
        ]);

        if ($item) {
            echo "<h2> KAYIT SİLİNDİ! </h2>";

        } else {
            echo "herhangi bir kayıt silinemedi";
        }

    }


}

function update($tableName, array $columnNames, array $values, $id)
{
    try {
        $setColumns = [];
        foreach ($columnNames as $columnName) {
            $setColumns[] = "$columnName = ?";
        }
        $setColumnsString = implode(", ", $setColumns);

        $pdo = connection();
        $statement = $pdo->prepare("UPDATE $tableName SET $setColumnsString WHERE id = ?");
        $values[] = $id;

        if ($statement->execute($values)) {
            return "Kayıt güncellendi.";
        } else {
            echo "Kayıt güncellenirken bir hata oluştu.";
        }
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage();
    }
}


/**
 * @param string $tableName
 * @param array $sutunNames
 * @param array $values
 * @param $id
 * @return void
 */
/*function update($tableName, array $sutunNames, array $values, $id)
{
    try {
        //$sutuns = implode(",",$sutunNames);
        $optinios = [];
        $argumants = array_map(function ($sutun) use ($optinios) {
            return $optinios[] = $sutun . ' = ?';
        }, $sutunNames);

        $argumant = implode(",", $argumants);

        $pdo = connection();
        $db = $pdo->prepare("update $tableName set $argumant where id=$id");

        $sql = $db->execute($values);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}*/



/*function calculateWeightedAverage($grades) {
    $totalWeight = 0;
    $weightedSum = 0;

    foreach ($grades as $grade) {
        $weightedSum += $grade['grade'] * $grade['weight'];
        $totalWeight += $grade['weight'];
    }

    if ($totalWeight == 0) {
        return 0;
    }

    return $weightedSum / $totalWeight;
}

$grades = array(
    array('grade' => 85, 'weight' => 0.3),  // Ders notu ve ağırlığı
    array('grade' => 70, 'weight' => 0.2),
    array('grade' => 90, 'weight' => 0.5)
);

$average = calculateWeightedAverage($grades);
return "Öğrencinin not ortalaması: " . $average;*/

/*function caculateWeightAverage($grades)
{
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

        return "<h3>Öğrencinin Not Ortalaması: $average</h3>";
    }
}*/
