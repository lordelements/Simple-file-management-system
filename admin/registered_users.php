<?
session_start();

?>


<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>


<main id="main" class="main">

  <div class="pagetitle">
    <h1>Lists of registered users</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Registered users</li>
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

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>More options</h6>
                  </li>
                  <li><a class="dropdown-item" href="upload_Images_File.php">Upload image</a></li>
                  <li><a class="dropdown-item" href="upload_PDF_File.php">Upload pdf</a></li>
                  <li><a class="dropdown-item" href="upload_DOCS_File.php">Upload docs</a></li>
                </ul>
              </div> -->

              <div class="card-body pb-0">
                <h5 class="card-title">Top Selling <span>| Today</span></h5>
                <!-- <a href="upload_Images_File.php" class="btn btn-primary mb-3">
                  <i class="fa fa-plus">Upload image</i>
                </a> -->
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Profile</th>
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
                      <th scope="col">Usertype</th>
                      <th scope="col">Date created</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include '../connnection/config.php';

                    $count = 0;
                    $query = "SELECT * FROM table_register_acc ORDER BY user_id DESC";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {

                        $user_id = $row['user_id'];
                        $uname = $row['username'];
                        $email = $row['email'];
                        $role = $row['usertype'];
                        $file_path = "../uploaded_Profiles/" . $row['profile_img'];
                        // $file_path = "../uploaded_Profiles/"  . $email ." ". $row['profile_img'];
                        $created_at = $row['created_at'];

                    ?>

                        <tr>
                          <td class="fw-bold" hidden><?php echo  $user_id ?></td>
                          <td><?php echo $count++ ?></td>
                          <td scope="row" class="body-rounded">
                            <img src="<?php echo $file_path ?>" alt="">
                          </td>
                          <td class="fw-bold"><?php echo  $uname ?></td>
                          <td class="fw-bold"><?php echo  $email ?></td>
                          <td class="fw-bold"><?php echo  $role ?></td>
                          <td class="fw-bold"><?php echo  $created_at ?></td>

                          <td class="fw-bold">
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')" href="Deluser_Acc.php? deluser_id= <?php echo  $row['user_id'] ?>">
                            <i class="bi bi-trash-fill"></i>
                            </a>
                            <a class="btn btn-success" href="Edituser_Acc.php? updateuser_id= <?php echo $user_id ?>">
                            <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="btn btn-primary" href="viewuser_acc.php? viewuser_id= <?php echo $user_id ?>">
                            <i class="bi bi-eye-fill"></i>
                            </a>
                          </td>

                        </tr>

                      <?php
                      }
                    } else {
                      ?>
                      <tr>
                        <td class="mb-3 fw-bold">&nbsp;&nbsp;&nbsp;No files yet</td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                  <div class="table_count mb-3">
                    <h6>
                      <strong>
                        <?php echo $count ?>&nbsp;&nbsp;&nbsp; Records
                      </strong>
                    </h6>
                  </div>
                </table>

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




<?php include_once('includes/scripts.php'); ?>
<?php include_once('includes/footer.php'); ?>