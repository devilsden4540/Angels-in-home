<?php
session_start();
include "connection.php";
$sid = $_GET['sid'];
$nid = $_GET['nid'];
$uid = $_SESSION['uid'];
$qryC = "SELECT count(*) FROM `bookings` WHERE `cid`='$uid' AND `sid`='$sid'";
$resC = mysqli_query($con, $qryC);
$count = mysqli_num_rows($resC);
$row = mysqli_fetch_array($resC);
$countC = $row[0];
if ($countC > 0) {
    echo "<script>alert('Already Booked...');location='custViewService.php'</script>";
} else {
    $qry = "INSERT INTO `bookings`(`cid`,`sid`,`nid`,`bdate`) VALUES ('$uid','$sid','$nid',(SELECT SYSDATE()))";
    $res = mysqli_query($con, $qry);
    if ($res) {
        echo "<script>alert('Booking Successful...');location='custViewService.php'</script>";
    } else {
        echo "<script>alert('Error Occured...');</script>";
    }
}
