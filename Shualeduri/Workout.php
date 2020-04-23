<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shualeduri - Workout</title>
</head>
<body>

<form action="damateba.php" method="post">
    Varjishis Dasaxeleba: <input type="text" name="Dasaxeleba">
    Varjishis Aghwera: <input type="text" name="Aghwera">

    <input type="submit" value="Damateba">
</form>

<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Dasaxeleba</th><th>Ganmarteba</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
echo "<br>";
echo "<br>";
echo "<br>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname="workout";

try {
    $conn = new PDO("mysql:host=$servername;dbname=workout", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM savarjisho");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }

}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<form action="Kvira.php" method="post">
<input type="submit" value="Kviris Generacia">
</form>
</body>
</html>