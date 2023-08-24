<?php 
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('Location: login.php');
    }
    if($_SESSION['user_role']!="Teacher"){
        header('Location: Teachers_dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <p>This is Teachers Dashboard Page</p>
        <button type="submit" class="btn btn-dark"><a href="login.php">Go to login</a></button>
        
    </div>
</body>
</html>