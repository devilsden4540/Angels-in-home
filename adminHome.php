<?php
session_start();
include "adminHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];

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
                            <h1 data-aos="fade-up" data-aos-delay="">Welcome Admin</h1>
                            <p class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    ======= Contact Section ======= -->
    <!-- <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">



            <div class="row gy-4 mt-1">
                <div class="col-lg-6" style="margin: auto;">
                    <form action="" method="post">
                        <div class="row gy-4 mb-3 ">
                            <div class="col-lg-6 form-group">
                                <input type="text" name="uname" class="form-control" id="name" placeholder="Username" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="password" class="form-control" name="password" id="email" placeholder="Password" required>
                            </div>
                        </div>


                        <div class="text-center"><button type="submit" name="submit" class="btn btn-warning">Login</button></div>
                    </form>
                </div>
                 End Contact Form

    </div>

    </div>
    </section> -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $qry = "SELECT * FROM `login` WHERE `username`='$uname'";
    $result = mysqli_query($con, $qry);
    $row = mysqli_fetch_array($result);
    if ($row['password'] == $password) {
        $_SESSION['uname'] = $uname;
        $_SESSION['uid'] = $row['uid'];
        if ($row['usertype'] == 'Admin') {
            echo "<script>alert('Login Successful');</script>";
            echo "<script>window.location.href='Home.php';</script>";
        } else if ($row['usertype'] == 'Pump') {
            echo "<script>alert('Login Successful');</script>";
            echo "<script>window.location.href='Home.php';</script>";
        } else if ($row['usertype'] == 'Customer') {
            echo "<script>alert('Login Successful');</script>";
            echo "<script>window.location.href='Home.php';</script>";
        }
    } else {
        echo "<script>alert('Login Failed');</script>";
    }
}
include "userFooter.php";
?>