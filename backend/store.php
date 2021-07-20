<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogsstorephp";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // var_dump("test");
      // $blogImage = isset($_POST['bimage']) ? $_POST["bimage"] : "";
      $title = isset($_POST['title']) ? $_POST['title'] : "";
      $body = isset($_POST['body']) ? $_POST['body'] : "";
      $date = isset($_POST['date']) ? $_POST['date'] : "";
      $tags = isset($_POST['tags']) ? $_POST['tags'] : "";

      
      $name = $_FILES['bimage']['name'];
      $target_dir = "../upload/";
      $target_file = $target_dir . basename($_FILES["bimage"]["name"]);

      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");

      move_uploaded_file($_FILES['bimage']['tmp_name'],$target_dir.$name);

  
      // var_dump($blogImage, $title, $body, $date, $tags);
      // exit();
  
      $sql = "INSERT INTO blogs (`bimage`, `title`, `body`, `date`, `tags`)
      VALUES ( '$target_file', '$title', '$body', '$date', '$tags')"; 
  
      // var_dump($sql);
      // exit();
    
      $conn->exec($sql);
      // echo "New record created successfully";
      // header('location: http://localhost/blog-app-php/frontend/');
      return "{status: 200, msg: 'suceessfully inserted'}";
    }
    
    }catch(PDOException $e) {
        return $sql . "<br>" . $e->getMessage();
    }

  $conn = null;
      
?>