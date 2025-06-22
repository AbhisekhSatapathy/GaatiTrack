<?php 

$conn= new mysqli('localhost','root','','gaatitrack')or die("Could not connect to mysql".mysqli_error(mysql: $con));


if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $delete = $conn->query("DELETE FROM users WHERE id = $id");
    if ($delete) {
        echo "<script>alert('Staff deleted successfully'); location.href='index.php?page=staff_list';</script>";
        exit;
    } else {
        echo "<script>alert('Failed to delete staff');</script>";
    }
}
?>
