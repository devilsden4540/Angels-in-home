<?php
include "connection.php";
$bid = $_GET['bid'];
$status = $_GET['status'];

$qry = "UPDATE `bookings` SET `status`='$status' WHERE `bid`='$bid'";
$res = mysqli_query($con, $qry);
if ($res) {
    echo "<script>alert('Status Updated...');location='nurseViewBookings.php'</script>";
} else {
    echo "<script>alert('Error Occured...');'</script>";
}
