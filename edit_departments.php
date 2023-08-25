<?php include 'connection.php'; ?>
<?php 
    $t_id = $_REQUEST['tId'];
    $s = "Select * from departments where id=".$t_id;
    $q = mysqli_query($conn, $s);
    $r = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Departments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Departments</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $r['name'] ?>" id="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="short_name" class="form-control" value="<?php echo $r['short_name'] ?>" id="">
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
        $dept_name = $_POST["name"];
        $dept_short_name = $_POST["short_name"];

        $str3 = "UPDATE departments SET name='".$dept_name."', 
                    short_name='".$dept_short_name."'
                    WHERE id=$r[id]";

        if(mysqli_query($conn, $str3)){
            header('Location: all_departments.php');
        }
    }

?>