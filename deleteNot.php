<?php
include('conn.php');
$id=$_GET['id'];
$delete="DELETE FROM notifications WHERE id=$id";
$sql=mysqli_query($conn,$delete);
if ($sql) {
    header('location: teacher.php');
}
else {
    echo "data not deleted";
}
?>