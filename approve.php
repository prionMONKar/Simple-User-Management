<?php 
    include 'connection.php';

    $userId = $_REQUEST['userId'];
    $s = "update users set status=1 where id=$userId";
    if(mysqli_query($conn, $s)){
        $getUserRoleQuery = "SELECT role FROM users WHERE id=$userId";
        $result = mysqli_query($conn, $getUserRoleQuery);
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $role = $user['role'];
            if ($role == 'Teacher') {
                header('Location: pending_teachers.php');
            } else {
                header('Location: pending_users.php');
            }
        } else {
            header('Location: pending_users.php');
        }
        exit();
    }
?>
