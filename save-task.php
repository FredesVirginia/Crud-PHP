<?php
   include("db.php");
    #iseet ->quiere decir, si exite, 
    if(isset($_POST['save-task'])){
       $title = $_POST['title'];
       $description = $_POST['description'];
       $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
       # la variable $conn, recordar que viene del archivo que requerimos db.php
        $result = mysqli_query($conn , $query);
        if(!$result){
            echo "Algo fallo";
            die("Query Failed");
        }
       
        #si todo sale bien, redirecionamos
        $_SESSION['message'] = 'Task Saved succesfully';
        $_SESSION['massage_type'] = "success";
        header("Location: index.php");
      
    }
?>