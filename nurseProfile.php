<?php
session_start();
include "nurseHeader.php";
include "connection.php";
$uid = $_SESSION['uid'];
$qry = "SELECT * FROM `nurses`n, `login`l WHERE n.`nid`='$uid' AND n.`nid`=l.`uid` AND l.`utype`='Nurse'";
$res = mysqli_query($con, $qry);
$row = mysqli_fetch_array($res)
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
                            <h1 data-aos="fade-up" data-aos-delay="">Profile</h1>
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
                <div class="col-lg-6" style="margin: auto;">
                    <form action="" method="post">
                        <div class="row gy-4 mb-3 ">
                            <div class="col-lg-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" pattern="[a-zA-Z ]+" value="<?php echo $row['name'] ?>" placeholder="Your Name" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email'] ?>" placeholder="Your Email" readonly required>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3 ">
                            <div class="col-lg-6 form-group">
                                <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $row['phone'] ?>" placeholder="Your Phone" pattern="[6789][0-9]{9}" maxlength="10" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <select name="district" class="form-control" id="" required>
                                    <option value="<?php echo $row['district'] ?>" selected><?php echo $row['district'] ?></option>
                                    <option value="Kasaragod">Kasaragod</option>
                                    <option value="Kannur">Kannur</option>
                                    <option value="Wayanad">Wayanad</option>
                                    <option value="Kozhikode">Kozhikode</option>
                                    <option value="Malappuram">Malappuram</option>
                                    <option value="Palakkad">Palakkad</option>
                                    <option value="Thrissur">Thrissur</option>
                                    <option value="Ernakulam">Ernakulam</option>
                                    <option value="Idukki">Idukki</option>
                                    <option value="Alappuzha">Alappuzha</option>
                                    <option value="Kottayam">Kottayam</option>
                                    <option value="Pathanamthitta">Pathanamthitta</option>
                                    <option value="Kollam">Kollam</option>
                                    <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group mb-3 ">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div> -->
                        <div class="form-group mb-3 ">
                            <textarea class="form-control" name="address" rows="5" placeholder="Address" required><?php echo $row['address'] ?></textarea>
                        </div>
                        <div class="row gy-4 mb-3 ">
                            <div class="col-lg-6 form-group">
                                <input type="text" name="exp" class="form-control" id="name" value="<?php echo $row['experience'] ?>" placeholder="Experience" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="text" class="form-control" name="qual" id="email" value="<?php echo $row['qualification'] ?>" placeholder="Qualification" required>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3 ">
                            <div class="col-lg-6 form-group">
                                <input type="password" name="password" class="form-control" id="name" value="<?php echo $row['password'] ?>" placeholder="Password" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="password" class="form-control" name="cPassword" id="email" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="my-3 mb-3 ">
                            <div class="error-message"></div>
                        </div>
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-warning">Register</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];
    $qual = $_POST['qual'];
    $exp = $_POST['exp'];

    if ($password == $cPassword) {

        $qry = "UPDATE `nurses` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address',`district`='$district',`qualification`='$qual',`experience`='$exp' WHERE `nid`='$uid'";
        $qryLog = "UPDATE `login` SET `password`='$password' WHERE `uid`='$uid' AND `utype`='Nurse';";
        if (mysqli_query($con, $qry) && mysqli_query($con, $qryLog)) {
            echo "<script>alert('Pament Completed');location='nurseProfile.php'</script>";
        } else {
            echo "<script>alert('Registration Failed');</script>";
        }
    } else {
        echo "<script>alert('Password Dosent Match');</script>";
    }
}
include "commonFooter.php";
?>