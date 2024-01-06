<?
session_start();
?>

<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update registered account</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Update registered account</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Top Selling -->
                    <div class="col-md-12">
                        <div class="card top-selling overflow-auto">

                            <div class="card-body pb-0">
                                <h5 class="card-title">Registered account <span>| Today</span></h5>
                                <div class="row">

                                    <?php include 'functions/editUser_accFunct.php'; ?>
                                  
                                  <?php
                                    include '../connnection/config.php';
                                    $user_id = $_GET['updateuser_id'];
                                    $query = "SELECT * FROM table_register_acc ORDER BY user_id = $user_id DESC";
                                    $result = mysqli_query($conn, $query);

                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $file_path = "../uploaded_Profiles/" . $row['profile_img'];
                                        $uname = $row['username'];
                                        $email = $row['email'];
                                        $pass = $password;
                                        $role = $row['usertype'];
                                    }

                                 ?>

                                    <form class="row g-3 needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>

                                        <div class="col-6">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" value="<?php echo $uname ?>" id="yourUsername" placeholder="Enter a username." required>
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>

                                        <div class="col-6">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email" class="form-control" value="<?php echo $email ?>" id="yourEmail" placeholder="Enter a valid Email adddres!" required>
                                                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourProfile" class="form-label">Identification</label>
                                            <input type="file" name="profile_img" class="form-control" value="<?php echo $file_path ?>" id="yourProfile" placeholder="Enter your profile identification" required>
                                            <div class="invalid-feedback">Please enter your profile id!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" value="<?php echo $password ?>" id="yourPassword" placeholder="Enter your password" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Confirm Password</label>
                                            <input type="password" name="cpassword" class="form-control" value="<?php echo $password ?>" id="yourPassword" placeholder="Confirm your password" required>
                                            <div class="invalid-feedback">Please confirm your password!</div>
                                        </div>

                                        <div class="col-12 ">
                                            <label class="form-label">Select Role</label>
                                            <select name="usertype" class="form-control" id="usertype" value="<?php echo $role ?>" required>
                                                <option value="select usertype">Select usertype</option>
                                                <option value="admin">Admin user</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                            <button class="btn btn-primary w-100" name="update" type="submit">Update Account</button>
                                        </div>
                                    </form>


                                </div>
                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                </div>
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