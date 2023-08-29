<?php include 'connection.php'; ?>
<?php 
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('Location: login.php');
    }
    if ($_SESSION['user_role'] != "Dept_Admin") {
        $currentFile = $_SERVER['PHP_SELF'];
        header("Location: $currentFile");
        exit();
    }
    $user_department = $_SESSION['user_department'];

    $str2 = "SELECT * FROM users WHERE status=1 AND role='Teacher' AND department='$user_department'";
    $q = mysqli_query($conn, $str2);
    // $str2 = "select * from users where status=1 and role= 'Teacher' and department='ME'";
    // $q = mysqli_query($conn, $str2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Course Teacher</h2>
        <div class="dropdown dropend">
            <div class="form-group">
                <label for="">Course Teacher</label>
                <select name="course_teacher" class="form-control" id="">
                    <option value="">Select Course Teacher</option>
                    <?php
                    $courseTeacherQuery = "SELECT name FROM users where role='Teacher' and department='$user_department'";
                    $courseTeacherResult = mysqli_query($conn, $courseTeacherQuery);
                    
                    while ($courseTeachers = mysqli_fetch_assoc($courseTeacherResult)) {
                        echo '<option value="' . $courseTeachers['name'] . '">' . $courseTeachers['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="button" class="btn btn-outline-primary"><a href="Semester.php">Go</a></button>
        </div>
    </div>
</body>
</html>