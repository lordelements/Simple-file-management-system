<?
session_start();

?>


<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>


<main id="main" class="main">

  <div class="pagetitle">
    <h1>Lists of uploaded images</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Uploaded files</li>
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

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>More options</h6>
                  </li>
                  <li><a class="dropdown-item" href="upload_Images_File.php">Upload image</a></li>
                  <li><a class="dropdown-item" href="upload_PDF_File.php">Upload pdf</a></li>
                  <li><a class="dropdown-item" href="upload_DOCS_File.php">Upload docs</a></li>
                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">Top Selling <span>| Today</span></h5>
                <a href="upload_Images_File.php" class="btn btn-primary mb-3">
                  <i class="fa fa-plus">Upload image</i>
                </a>
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">File image</th>
                      <th scope="col">File name</th>
                      <th scope="col">File title</th>
                      <th scope="col">Date uploaded</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include '../connnection/config.php';

                    $count = 0;
                    $query = "SELECT * FROM upload_files ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {

                        $file_path = "../uploaded_Imagesfiles/" . $row['files'];
                        $filename = " " . $row['files'];

                    ?>

                        <tr>
                          <td><?php echo $count++ ?></td>
                          <!-- <td><?php echo $row['id'] ?></td> -->
                          <!-- <td scope="row" class="body-rounded"><?php echo '<img src="../uploaded_Imagesfiles/' . $row['files'] . '" 
                        alt="files" style="width: 250px; heigth: 250px;">' ?></td> -->
                          <td scope="row" class="body-rounded"><img src="<?php echo  $file_path ?>" alt=""></td>
                          <td scope="row" class="body-rounded"><?php echo  $filename ?></td>
                          <td class="fw-bold"><?php echo  $row['title_file'] ?></td>
                          <td class="fw-bold"><?php echo  $row['uploaded_at'] ?></td>

                          <td class="fw-bold">
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')" href="delFileupload.php? deleteid= <?php echo  $row['id'] ?>">
                              <i class="fa fa-trash">Delete</i>
                            </a>
                            <a class="btn btn-success" href="<?php echo  $file_path ?>" download target="_blank">
                              <i class="fa fa-download">Download</i>
                            </a>
                          </td>

                        </tr>

                      <?php
                      }
                    } else {
                      ?>
                      <tr>
                        <td class="mb-3 fw-bold">&nbsp;&nbsp;&nbsp;No files uploaded yet</td>
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