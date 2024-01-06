<?php
include './connnection/config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <?php

            $username = $_SESSION["username"];
            $result = mysqli_query($conn, "SELECT firstname, middlename, lastname, profile_img FROM `table_register_acc` WHERE username='$username'");
            if ($row = mysqli_fetch_array($result)) {
              $file_path = "./uploaded_Profiles/" . $row['profile_img'];
              $fullname = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
            // if ($result) {
            //   while ($row = mysqli_fetch_assoc($result)) {
            //     $file_path = "./uploaded_Profiles/" . $row['profile_img'];
            //     $fullname = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
            //   }

            ?>

              <img src="<?php echo $file_path ?>" alt="Profile" class="rounded-circle" width="150" height="150">
              <h2><?php echo $fullname ?></h2>
              <h3>Web Designer</h3>

            <?php

            } else {

              echo '<div class="row">
                        <div class="col-md-8 col-lg-9">
                          No found data
                        </div>
                      </div>';
            }
            ?>


            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-8">
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>
            </ul>
            <div class="tab-content pt-2">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>
                <?php

                $username = $_SESSION["username"];
                $result = mysqli_query($conn, "SELECT * FROM `table_register_acc` WHERE username='$username'");

                // if ($result) {
                //   while ($row = mysqli_fetch_assoc($result)) {
                //     $file_path = "./uploaded_Profiles/" . $row['profile_img'];
                //     $fname  = $row['firstname'];
                //     $mname  = $row['middlename'];
                //     $lname  = $row['lastname'];
                //     $email     = $row['email'];
                //     $time_created = $row['created_at'];
                //   }
                  if ($row = mysqli_fetch_array($result)) {
                    $file_path = "./uploaded_Profiles/" . $row['profile_img'];
                    $fname  = $row['firstname'];
                    $mname  = $row['middlename'];
                    $lname  = $row['lastname'];
                    $email     = $row['email'];
                    $time_created = $row['created_at'];
                  // }
                ?>

                  <div class="row mb-4">
                    <div class="col-lg-3 col-md-4 label ">Profile picture</div>
                    <div class="col-md-8 col-lg-9">
                      <img src="<?php echo $file_path ?>" alt="Profile" class="image-fluid" width="300" height="300">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">First Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fname ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Middle Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $mname ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Last Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $lname ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $email ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Time created</div>
                    <div class="col-lg-9 col-md-8"><?php echo $time_created ?></div>
                    <!-- <input type="hidden" name="user_id" <?php echo $row['user_id'] ?>> -->
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

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <h5 class="card-title">Edit Profile Details</h5>
                <?php
                  $username = $_SESSION["username"];
                  $result = mysqli_query($conn, "SELECT * FROM `table_register_acc` WHERE  username='$username'");

                  if ($row = mysqli_fetch_array($result)) {
                    $user_id = $row["user_id"];
                    $file_path = "./uploaded_Profiles/" . $row['profile_img'];
                  }
                ?>
                <!-- Edit profile picture -->
                <form method="post" action="functions/editprofileFunct.php">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Picture</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="<?php echo $file_path ?>" alt="Profile" class="image-fluid" width="300" height="300">
                      <div class="pt-2">
                        <a href="editprofile_pic.php? update_pic=<?php echo $user_id ?>" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                      </div>
                    </div>
                  </div>
                </form> <!-- End edit profile picture -->

                <?php
                  $username = $_SESSION["username"];
                  $result = mysqli_query($conn, "SELECT * FROM `table_register_acc` WHERE username='$username'");

                  if ($row = mysqli_fetch_array($result)) {
                    $user_id = $row["user_id"];
                  }
                ?>

                <form method="post" action="functions/edit_loginDetails.php">
                  <div class="row mb-3">
                    <label for="Firstname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" name="firstname" class="form-control" id="Firstname" value="<?php echo $row['firstname'] ?>" placeholder="Enter a firstname." required>
                      <div class="invalid-feedback">Please choose a firstname.</div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Middlename" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" name="middlename" class="form-control" id="Middlename" value="<?php echo $row['middlename'] ?>" placeholder="Enter a middlename." required>
                      <div class="invalid-feedback">Please choose a middlename.</div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Last Name" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" name="lastname" class="form-control" id="Lastname" value="<?php echo $row['lastname'] ?>" placeholder="Enter a firstname." required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" value="<?php echo $row["email"] ?>" id="Email">
                    </div>
                  </div>
                  <div class="text-center col-md-8 m-2">
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                    <input type="hidden" name="usertype" class="form-control" id="usertype" value="user">
                    <button type="submit" class="btn btn-primary" name="update">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>
                <?php include 'change_pass.php'; ?>
            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<!-- Show password function -->
<script src="assets/js/show-register-pass.js"></script>
<?php include_once('includes/scripts.php'); ?>
<?php include_once('includes/footer.php'); ?>