<?
session_start();
?>

<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>


<main id="main" class="main">

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Registered User Details</h5>
                            <?php

                            include '../connnection/config.php';
                            $user_id = $_GET['viewuser_id'];
                            $result = mysqli_query($conn, "SELECT `firstname`, `middlename`, `lastname`, 
                        `username`, `email`, `password`, `profile_img`, `usertype`, `created_at`
                         FROM `table_register_acc` WHERE user_id='$user_id'");

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $file_path = "../uploaded_Profiles/" . $row['profile_img'];
                                    $fname  = $row['firstname'];
                                    $mname  = $row['middlename'];
                                    $lname  = $row['lastname'];
                                    $username  = $row['username'];
                                    $email     = $row['email'];
                                    $role     = $row['usertype'];
                                    $time_created = $row['created_at'];
                                }

                            ?>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label ">Profile picture</div>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="<?php echo $file_path ?>" alt="Profile" class="image-fluid" width="250" height="250">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label ">First Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $fname ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label ">Middle Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $mname ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label ">Last Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $lname ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label ">Username</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $username ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $email ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label">User Type</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $role ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label">Time created</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $time_created ?></div>
                                </div>

                            <?php
                            } else {

                                echo '<div class="row">
                                        <div class="col-md-8 col-lg-9">
                                        No found data
                                        </div>
                                   </div>';
                            }
                            ?>

                        </div>
                    </div>
                </div><!-- End Bordered Tabs -->
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <!-- <div class="col-lg-4">

    </div> -->
            <!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->

<script>
    // profile 
    const image = document.getElementById("img"),
        img_file = document.getElementById("img-file");

    img_file.addEventListener("change", (e) => {
        e.preventDefault();
        img.src = URL.createObjectURL(img_file.files[0]);
    });
</script>


<?php include_once('includes/scripts.php'); ?>
<?php include_once('includes/footer.php'); ?>