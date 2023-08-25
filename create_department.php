<?php 
    include 'connection.php';
    // session_start();
    // if(!isset($_SESSION['user_name'])){
    //     header('Location: login.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Add a Department</h2>
            <form method="POST">
                <input type="text" name="department_name" class="form-control" placeholder="Department Name" required></b>
                <input type="text" name="department_short_name" class="form-control" placeholder="Department Short Name" required></b>
                <button type="submit" class="btn btn-primary" name="submitBtn">Create Department</button>
            </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submitBtn'])){
        $dept_name = $_POST["department_name"];
        $dept_short_name = $_POST["department_short_name"];
        $str1 = "INSERT INTO departments(name, short_name)
        VALUES 
        ('".$dept_name."', '".$dept_short_name."')";
        if(mysqli_query($conn, $str1)){
            header('Location: dashboard.php');
        }
    }
?>