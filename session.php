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
    // $user_department = $_SESSION['user_department'];

    // $str2 = "SELECT * FROM users WHERE status=1 AND role='Teacher' AND department='$user_department'";
    // $q = mysqli_query($conn, $str2);
    // $str2 = "select * from users where status=1 and role= 'Teacher' and department='ME'";
    // $q = mysqli_query($conn, $str2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Session</h2>
        <div class="dropdown dropend">
            <div class="form-group">
                <label for="">Session</label>
                <select name="department" class="form-control" id="">
                    <option value="">Select Session</option>
                    <?php
                    $sessionQuery = "SELECT name FROM sessions";
                    $sessionResult = mysqli_query($conn, $sessionQuery);
                    
                    while ($session = mysqli_fetch_assoc($sessionResult)) {
                        echo '<option value="' . $session['name'] . '">' . $session['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="button" class="btn btn-outline-primary"><a href="course_teacher.php">Go</a></button>
        </div>
    </div>
</body>
</html>