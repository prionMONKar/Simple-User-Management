<?php include 'connection.php'; ?>
<?php 
    $t_id = $_REQUEST['tId'];
    $s = "Select * from users where id=".$t_id;
    $q = mysqli_query($conn, $s);
    $r = mysqli_fetch_assoc($q);
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
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Teacher</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $r['name'] ?>" id="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $r['email'] ?>" id="">
            </div>
            <div class="form-group">
                <label for="">Department</label>
                <select name="department" class="form-control" id="">
                    <option value="">Select Department</option>
                    <?php
                        $departmentQuery = "SELECT name,short_name FROM departments"; // Assuming 'departments' is your departments table
                        $departmentResult = mysqli_query($conn, $departmentQuery);
                        
                        if ($departmentResult && mysqli_num_rows($departmentResult) > 0) {
                            while ($departmentRow = mysqli_fetch_assoc($departmentResult)) {
                                $departmentName = $departmentRow['name'];
                                $departmentShortName = $departmentRow['short_name'];
                                $selected = ($r['department'] == $departmentShortName) ? 'selected' : '';
                                echo '<option ' . $selected . ' value="' . $departmentShortName . '">' . $departmentName . '</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <input type="text" name="role" class="form-control" value="<?php echo $r['role'] ?>" id="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-secondary" name="submitBtn">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submitBtn'])){
        $teacher_name = $_POST["name"];
        $teacher_email = $_POST["email"];
        $teacher_department = $_POST["department"];
        $teacher_role = $_POST["role"];

        $str = "UPDATE users SET name='".$teacher_name."', 
                    email='".$teacher_email."',
                    department='".$teacher_department."',
                    role='".$teacher_role."'
                    WHERE id=$r[id]";

        if(mysqli_query($conn, $str)){
            $s1 = "Select role from users";
            $q1 = mysqli_query($conn, $s1);
            if($q1 == 'Dept_Admin'){
                header('Location: all_department_admins.php');
            }
            else{
                header('Location: teachers.php');
            }
        }
    }

?>