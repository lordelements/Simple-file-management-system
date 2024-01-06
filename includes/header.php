<?php include_once('mainheader.php'); ?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">D-DRIVE</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> -->
  <!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <span class="d-none d-md-block dropdown-toggle ps-2">Welcome back <?php echo $_SESSION['username']; ?></span>
        </a><!-- End Profile Iamge Icon -->

        <?php
          include "./connnection/config.php";
          $username = $_SESSION["username"];
          $result = mysqli_query($conn, "SELECT firstname, middlename, lastname, profile_img FROM `table_register_acc` WHERE username='$username'");
          if ($row = mysqli_fetch_array($result)) {
            $file_path = "./uploaded_Profiles/" . $row['profile_img'];
            $fullname = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
        ?>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <a class="nav-link nav-profile align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="<?php echo $file_path ?>" alt="Profile" class="rounded-circle">
              </a><!-- End Profile Iamge Icon -->
              <h6 class="mt-3"><?php echo $fullname ?></h6>
              <span><?php echo $_SESSION['username']; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="./logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->

        <?php

        } else {

          echo '<div class="row">
            <div class="col-md-8 col-lg-9">
              No found data
            </div>
          </div>';
        }
        ?>
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->