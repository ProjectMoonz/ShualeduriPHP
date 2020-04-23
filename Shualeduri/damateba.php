<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="workout";

    
    $dasaxeleba = $_POST["Dasaxeleba"];
    $aghwera = $_POST["Aghwera"];
    
    if(strlen($aghwera) >= 5 && strlen($aghwera) <= 100) {
        $dasaxeleba = $_POST["Dasaxeleba"];
        $aghwera = $_POST["Aghwera"];
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO `savarjisho` (`Dasaxeleba`, `Ganmarteba`) VALUES (:Dasaxeleba, :Aghwera)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':Dasaxeleba', $dasaxeleba);
            $stmt->bindParam(':Aghwera', $aghwera);
            $stmt->execute();
            echo "New record created successfully";
            }
            catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
    } else {
        echo "Please correct the mistakes and try again!";
    }
?>
