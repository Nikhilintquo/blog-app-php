<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogsstorephp";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM blogs");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // foreach((new RecursiveArrayIterator()) as $k=>$v) {
    //   echo $v;
    // }
    echo json_encode($stmt->fetchAll());
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

      
?>