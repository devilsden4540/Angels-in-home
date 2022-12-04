<?php
session_start();
include "custHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
$nid = $_GET['nid'];
$qry = "SELECT * FROM `feedback`f, `customers`c WHERE f.`nid`='$nid' AND f.`cid`=c.`cid`";
$res = mysqli_query($con, $qry);
$count = mysqli_num_rows($res);
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
                            <h1 data-aos="fade-up" data-aos-delay="">Feedbacks</h1>
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



            <div class="row gy-4 mt-1">
                <div class="col-lg-12" style="margin: auto;margin-bottom:200px">
                    <?php
                    if ($count > 0) {
                    ?>
                        <table class='table table-secondary table-striped table-hover text-center'>
                            <tr>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Feedback</th>
                                <th>Rating</th>

                            </tr>
                            <?php
                            while ($row = mysqli_fetch_array($res)) {
                                $rating = $row['rating'];
                                echo "<tr>
                            <td>$row[date]</td>
                            <td>$row[name]</td>
                            <td>$row[feedback]</td>";
                            ?>
                                <td>
                                    <?php if ($rating == "5") { ?>
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                    <?php } elseif ($rating == "4") { ?>
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                    <?php } elseif ($rating == "3") { ?>
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                    <?php } elseif ($rating == "2") { ?>
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                    <?php } elseif ($rating == "1") { ?>
                                        <img src="./assets/images/filledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                    <?php } elseif ($rating == "0") { ?>
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                        <img src="./assets/images/unfilledstar.png" height="20px" width="20px">
                                    <?php } ?>
                                </td>
                            <?php
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
if (isset($_POST['submit'])) {
    $service = $_POST['service'];
    $cost = $_POST['cost'];

    $folder = './images/';
    $file = $folder . basename($_FILES['txtFile']['name']);
    move_uploaded_file($_FILES['txtFile']['tmp_name'], $file);

    $qry = "INSERT INTO `service` (`service`,`docs`,`cost`) VALUES ('$service','$file','$cost')";
    if (mysqli_query($con, $qry) == TRUE) {
        echo "<script>alert('Service Added Successfully')</script>";
    } else {
        echo "<script>alert('Error Occured')</script>";
    }
}
include "userFooter.php";
?>