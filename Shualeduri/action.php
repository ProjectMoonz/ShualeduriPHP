<?php
    include 'db.php';
    
    class Queries{
        public $conn;
        
        function __construct(){
            $db = new DB();
            $this->conn = $db->connection();
        }
    
    
        function getRandomWorkout(){
            $id
            $stmt = $this->conn->prepare('SELECT * FROM savarjisho ORDER BY RAND() LIMIT 7');
            $stmt->bindParam(':ID', $id);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;
        }
    
    
        function checkAnsware($answareId){
            $stmt = $this->conn->prepare('SELECT * FROM tests WHERE correct_answare=:answareId');
            $stmt->bindParam(':answareId', $answareId);
            $stmt->execute();
            $data = $stmt->fetchAll();
            echo $data;
            print_r($data);
            return $data;
        }
    
        function insertUserAndScore($username, $score, $passed){
            $stmt = $this->conn->prepare('INSERT INTO `users`(`username`, `score`, `passed`) VALUES (:username,:score,:passed)');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':score', $score);
            $stmt->bindParam(':passed', $passed);
            
            $stmt->execute();
            echo 'warmatebit chaabare dzmobilo';
    
        }
    }
?>