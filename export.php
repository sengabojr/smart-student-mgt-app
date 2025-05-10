<?php
include("conn.php");
$table = "users";
$selectData = "SELECT * FROM $table";
$retrieve = mysqli_query($conn, $selectData);

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachement; filename={$table}_holiday.xls");

$DbField = mysqli_fetch_fields($retrieve);

foreach($DbField as $field) {
    echo $field -> name. "\t"; 

}
echo "\n"; 
while($rows = mysqli_fetch_assoc($retrieve)) { 
    echo implode("\t", $rows). "\n"; 
}
?>