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
    // $user_semester = $_SESSION['user_semester'];

    // $str2 = "SELECT * FROM semesters WHERE semester_id ='$user_semester'";
    // $q = mysqli_query($conn, $str2);
    // $str2 = "select * from users where status=1 and role= 'Teacher' and department='ME'";
    // $q = mysqli_query($conn, $str2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Semester</h2>
        <div class="dropdown dropend">
            <form method="POST">
                <label>Select a Semester</label>
                <select name="Semester">
                    <?php
                        while ($semester = mysqli_fetch_array($all_semesters, MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $semester['Semester_Name']; ?>">
                            <?php echo $semester['Semester_Name']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select>
                <input type="submit" value="submit" name="submit">
            </form>
            <button type="button" class="btn btn-outline-primary"><a href="course.php">Go</a></button>
        </div>
    </div>
</body>
</html>