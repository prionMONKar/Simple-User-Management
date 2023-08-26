<?php include 'connection.php'; ?>
<?php
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('Location: login.php');
    }
?>
<?php
    $str2 = "select * from departments";
    $q = mysqli_query($conn, $str2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <h2>Dashboard</h2>
        <div class="dropdown dropend">
            <button 
                type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Menu
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="pending_users.php">Pending Users</a></li>
                <li><a class="dropdown-item" href="create_department.php">Create Department</a></li>
                <li><a class="dropdown-item" href="all_departments.php">Update Departments</a></li>
            </ul>
            <button type="button" class="btn btn-outline-primary"><a href="login.php">Sign Out</a></button>
        </div>
    </div>
    <div class="container">
        <h2>All Departments</h2>
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Short Name</th>
            </thead>
            <tbody>
                <?php 
                    while($r = mysqli_fetch_array($q)){ ?>
                        <tr>
                            <td><?php echo $r['name']; ?></td>
                            <td><?php echo $r['short_name']; ?></td>
                        </tr>
                    <?php }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>