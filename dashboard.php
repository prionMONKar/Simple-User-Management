<?php 
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('Location: login.php');
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
        <p>This is dashboard Page</p>
        <?php 
            if($_SESSION['user_role']=="Super Admin"){ ?>
                <ul>
                    <li><a href="pending_users.php">Pending Users</a></li>
                </ul>
            <?php  }
        ?>
        <div class="container">
            <h2>Edit Department</h2>
            <!-- <form action="" method="post"> -->
                <form method="POST">
                    <input type="hidden" name="action" value="create">
                    <input type="text" name="department_name" placeholder="Department Name" required>
                    <button type="submit">Create Department</button>
                </form>
                <!-- <div class="form-group">
                    <button type="submit" class="btn btn-secondary" name="submitBtn">Update</button>
                </div>
            </form> -->
        </div>
    </div>
</body>
</html>

<?php 
    if(isset($_POST['submitBtn'])){
        $dept_name = $_POST["name"];
        $teacher_email = $_POST["email"];
        $teacher_department = $_POST["department"];
        $password = $_POST["password"];
        $cnf_password = $_POST["cnf_password"];
        $role = $_POST["role"];

        if($password == $cnf_password){
            $str = "INSERT INTO users(name, email, department, password, role)
            VALUES 
            ('".$teacher_name."', '".$teacher_email."', '".$teacher_department."', '".md5($password)."', '".$role."')";
            if(mysqli_query($conn, $str)){
                header('Location: login.php');
            }
        }
        else {
            echo 'Password Mismatch';
        }
    }

?>