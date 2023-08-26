<?php include 'connection.php'; ?>
<?php
    $str2 = "select * from users where role='Dept_Admin'";
    $q = mysqli_query($conn, $str2);
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
    <title>All Departments Admins</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>All Department Admins</h2>
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    while($r = mysqli_fetch_array($q)){ ?>
                        <tr>
                            <td><?php echo $r['name']; ?></td>
                            <td><?php echo $r['email']; ?></td>
                            <td><?php echo $r['department']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="edit.php?tId=<?php echo $r['id'] ?>" >Edit</a>
                                <a class="btn btn-secondary" data-toggle="modal" data-target="#myModal<?php echo $r['id']; ?>" >Delete</a>
                                <div class="modal" id="myModal<?php echo $r['id']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Confirmation</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            Are you sure you want to delete <?php echo $r['name']; ?> ?
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="delete.php?tId=<?php echo $r['id'] ?>">Yes</a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>