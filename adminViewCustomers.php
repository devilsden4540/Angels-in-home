<?php
session_start();
include "adminHeader.php";
include "connection.php";

$qryAct = "SELECT * FROM `login`l, `customers`c WHERE l.`uid`=c.`cid` AND l.`utype`='Customer' AND l.`status`='Active'";
$resAct = mysqli_query($con, $qryAct);
$actCount = mysqli_num_rows($resAct);
$qryRej = "SELECT * FROM `login`l, `customers`c WHERE l.`uid`=c.`cid` AND l.`utype`='Customer' AND l.`status`='Rejected'";
$resRej = mysqli_query($con, $qryRej);
$rejCount = mysqli_num_rows($resRej);
?>

<main id="main">

    <section class="hero-section inner-page">
        <div class="wave">
            <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                        <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
                    </g>
                </g>
            </svg>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-md-7 text-center hero-text">
                            <h1 data-aos="fade-up" data-aos-delay="">Customers</h1>
                            <p class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 mt-3">
                <div class="col-lg-12" style="margin: auto;">
                    <?php
                    if ($actCount > 0) {
                    ?>
                        <h3 class="text-center">Active Customers</h3>
                        <table class='table table-secondary table-striped table-hover text-center'>
                            <tr>
                                <th>Id.</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>District</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($resAct)) {
                                $i++;
                                echo "<tr>
                            <td>$i</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[district]</td>
                            <td>$row[address]</td>
                            <td><a href='adminUpdateStatus.php?id=$row[lid]&status=Rejected&url=adminViewCustomers.php'>Reject</a></td>
                            </tr>";
                            }
                            ?>
                        </table>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row gy-4 mt-3">
                <div class="col-lg-12" style="margin: auto;">
                    <?php
                    if ($rejCount > 0) {
                    ?>
                        <h3 class="text-center">Rejected Customers</h3>
                        <table class='table table-secondary table-striped table-hover text-center'>
                            <tr>
                                <th>Id.</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>District</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($resRej)) {
                                $i++;
                                echo "<tr>
                            <td>$i</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[district]</td>
                            <td>$row[address]</td>
                            <td><a href='adminUpdateStatus.php?id=$row[lid]&status=Active&url=adminViewCustomers.php'>Activate</a></td>
                            </tr>";
                            }
                            ?>
                        </table>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
if (isset($_POST['submit'])) {
    $fuel = $_POST['fuel'];
    $rate = $_POST['rate'];
    $qry = "SELECT COUNT(*) FROM `fuel` WHERE `fuel`='$fuel'";
    $result = mysqli_query($con, $qry);
    $row = mysqli_fetch_array($result);
    if ($row[0] > 0) {
        echo "<script>alert('Data already exist...');</script>";
    } else {
        $qryIns = "INSERT INTO fuel(fuel,rate) VALUES('$fuel','$rate')";
        $res = mysqli_query($con, $qryIns);
        if ($res) {
            echo "<script>alert('Fuel Added...');</script>";
        } else {
            echo "<script>alert('Error Occured...');</script>";
        }
    }
}
include "commonFooter.php";
?>