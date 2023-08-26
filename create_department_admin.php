<?php 
    include 'connection.php';
?>
<?php 
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('Location: login.php');
    }
    if ($_SESSION['user_role'] != "Super Admin") {
        $currentFile = $_SERVER['PHP_SELF'];
        header("Location: $currentFile");
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Department Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Add a Department Admin</h2>
            <form method="POST">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" required></b>
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" required></b>
                <div class="form-group">
                    <label for="">Department</label>
                    <select name="department" class="form-control" id="">
                        <option value="">Select Department</option>
                        <?php
                        $departmentQuery = "SELECT name,short_name FROM departments";
                        $departmentResult = mysqli_query($conn, $departmentQuery);
                        
                        while ($department = mysqli_fetch_assoc($departmentResult)) {
                            echo '<option value="' . $department['short_name'] . '">' . $department['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" id="">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="cnf_password" class="form-control" placeholder="Confirm Password" id="">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" id="" class="form-control">
                        <option value="">Select Role</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Dept_Admin">Department Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submitBtn">Create Department Admin</button>
            </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submitBtn'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $department = $_POST["department"];
        $password = $_POST["password"];
        $cnf_password = $_POST["cnf_password"];
        $role = $_POST["role"];

        if($password == $cnf_password){
            $str = "INSERT INTO users(name, email, department, password, role)
            VALUES 
            ('".$name."', '".$email."', '".$department."', '".md5($password)."', '".$role."')";
            if(mysqli_query($conn, $str)){
                header('Location: all_department_admins.php');
            }
        }
        else {
            echo 'Password Mismatch';
        }
    }
?>