<?php
include('conn.php');

$id=$_GET['id'];
$delete="DELETE FROM clubs WHERE id='$id'";
$sql=mysqli_query($conn,$delete);
if ($sql) {
    echo"data deleted successfully";
}
else{
    echo "not deleted please try again!!" . mysqli_error($conn );
}

?>           