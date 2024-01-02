<?php include '../connnection/config.php';?>
<?php include_once ('includes/header.php');?>
<?php include_once ('includes/sidebar.php');?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Total registered users Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card bg-secondary-light">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>

                <?php 

                  
                  $total_users = "SELECT * FROM table_register_acc"; 
                  $totalRegistered_users = mysqli_query($conn, $total_users);
                  if ($usersAcc =mysqli_num_rows($totalRegistered_users)) {
                    
                    echo '<div class="ps-3 mt-4 ">
                    <h6>$'.$usersAcc.'</h6>
                    <span class="text-success small pt-1 fw-bold"> <a href="registered_users.php">Total registered users </a>
                    </span>
                    </div>';
  
                  }
                  else {

                    echo '<span class="text-success small pt-1 fw-bold">No data found</span>';

                  }
                
                    
                ?>
                
              </div>
            </div>
          </div>
        </div><!-- End Total registered users Card -->

        <!-- Total Uploaded PDF Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card bg-danger-light">

            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-filetype-pdf"></i>
                </div>

                <?php 

                  $total_uploadedPDF = "SELECT * FROM table_pdffile"; 
                  $totalPDF = mysqli_query($conn, $total_uploadedPDF);
                  if ($uploadedPDF =mysqli_num_rows($totalPDF)) {
                    
                    echo '<div class="ps-3 mt-4 ">
                    <h6>$'.$uploadedPDF.'</h6>
                    <span class="text-success small pt-1 fw-bold"> 
                    <a href="uploadedPDFfiles.php">Total uploaded PDF </a> </span>
                    </div>';
  
                  }
                  else {

                    echo '<span class="text-success small pt-1 fw-bold">No data found</span>';

                  }
                
                ?>
                
              </div>
            </div>
          </div>
        </div><!-- End Total Uploaded PDF Card -->

        <!-- Total Uploaded DOCS Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card bg-primary-light">

            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-file-earmark-word"></i>
                </div>

                <?php 

                  $total_uploadedDOCS = "SELECT * FROM table_documents"; 
                  $totalDOCS = mysqli_query($conn, $total_uploadedDOCS);
                  if ($uploadedDOCS =mysqli_num_rows($totalDOCS)) {
                    
                    echo '<div class="ps-3 mt-4 ">
                    <h6>$'.$uploadedDOCS.'</h6>
                    <span class="text-success small pt-1 fw-bold"> <a href="uploadedDOCSFiles_lists.php">Total uploaded document </a>
                     </span>
                    </div>';
  
                  }
                  else {

                    echo '<span class="text-success small pt-1 fw-bold">No data found</span>';

                  }
                
                ?>
                
              </div>
            </div>
          </div>
        </div><!-- End Total Uploaded DOCS Card -->

        <!-- Total Uploaded IMAGES Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card bg-warning-light">

            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-file-earmark-image"></i>
                </div>

                <?php 

                  $total_uploadedIMG = "SELECT * FROM upload_files"; 
                  $totalIMG = mysqli_query($conn, $total_uploadedIMG);
                  if ($uploadedIMG =mysqli_num_rows($totalIMG)) {
                    
                    echo '<div class="ps-3 mt-4 ">
                    <h6>$'.$uploadedIMG.'</h6>
                    <span class="text-success small pt-1 fw-bold">
                    <a href="uploadedImagesFiles_lists.php">Total uploaded pictures  </a> </span>
                    </div>';
  
                  }
                  else {

                    echo '<span class="text-success small pt-1 fw-bold">No data found</span>';

                  }
                
                ?>
                
              </div>
            </div>
          </div>
        </div><!-- End Total Uploaded IMAGES Card -->

        <!-- Total Uploaded Videos Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card bg-success-light">

            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-camera-video"></i>
                </div>

                <?php 

                  $total_uploadedVideos = "SELECT * FROM table_videos"; 
                  $totalVideos = mysqli_query($conn, $total_uploadedVideos);
                  if ($uploadedVideos =mysqli_num_rows($totalVideos)) {
                    
                    echo '<div class="ps-3 mt-4 ">
                    <h6>$'.$uploadedVideos.'</h6>
                    <span class="text-success small pt-1 fw-bold">
                    <a href="uploadedVideoFiles_lists.php"> Total uploaded videos </a> </span>
                    </div>';
  
                  }
                  else {

                    echo '<span class="text-success small pt-1 fw-bold">No data found</span>';

                  }
                
                ?>
                
              </div>
            </div>
          </div>
        </div><!-- End Total Uploaded Videos Card -->

      </div>
    </div><!-- End Left side columns -->


  </div>
</section>


</main><!-- End #main -->




<?php include_once ('includes/scripts.php');?>
<?php include_once ('includes/footer.php');?>
