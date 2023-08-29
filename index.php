<?php include 'connection.php'; ?>
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
        <h2>Register Here</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="">
            </div>
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
                <input type="password" name="password" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="cnf_password" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="role" id="" class="form-control">
                    <option value="">Select Role</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Dept_Admin">Department Admin</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submitBtn">Save</button>
            </div>
            <p>Already have an account?<a href="login.php">Click Here</a></p>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submitBtn'])){
        $teacher_name = $_POST["name"];
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