<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Teachers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Add a Teacher</h2>
            <form method="POST">
                <input type="text" name="name" class="form-control" placeholder="Name" required></b>
                <input type="text" name="email" class="form-control" placeholder="Email" required></b>
                <button type="submit" class="btn btn-primary" name="submitBtn">Create Teacher</button>
            </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submitBtn'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $str1 = "INSERT INTO users(name, email)
        VALUES 
        ('".$name."', '".$email."')";
        if(mysqli_query($conn, $str1)){
            header('Location: dept_Admin_dashboard.php');
        }
    }
?>