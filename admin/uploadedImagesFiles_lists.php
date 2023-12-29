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
                  <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#uploadimg-Modal">
                  <i class="bi bi-upload"></i>Upload image</a></li>
                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">Top Selling <span>| Today</span></h5>
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

                        $id = $row["id"];
                        $file_path = "../uploaded_Imagesfiles/" . $row['files'];
                        $filename = " " . $row['files'];

                    ?>
                        <tr>
                          <td><?php echo $count++ ?></td>
                          <td scope="row" class="body-rounded"><img src="<?php echo $file_path ?>" alt=""></td>
                          <td scope="row" class="body-rounded"><?php echo  $filename ?></td>
                          <td class="fw-bold"><?php echo  $row['title_file'] ?></td>
                          <td class="fw-bold"><?php echo  $row['uploaded_at'] ?></td>
                          <td class="fw-bold">
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')"
                             href="Deluploaded_img.php? deleteid= <?php echo $id ?>">
                             <i class="bi bi-trash-fill"></i>
                            </a>
                            <a class="btn btn-primary" href="<?php echo  $file_path ?>" download target="_blank">
                            <i class="bi bi-download"></i>
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

          <!-- Upload Images Modal -->
          <div class="modal fade" id="uploadimg-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <?php include 'functions/upload_ImagesFunct.php'; ?>

                <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="mb-3 d-flex justify-content-center">
                      <img class=" justify-content-center rounded" src="./assets/img/pic_avatar.png" alt="" id="img" width="200" height="200">
                    </div>
                    <div class="mb-3">
                      <label for="title_file" class="mt-4">Title of file</label>
                      <input type="text" class="form-control mt-2" id="title_file" placeholder="Name of file" name="title_file" required>
                    </div>
                    <div class="mb-3">
                      <label for="validationTooltip01" class="mt-4">File to upload</label>
                      <input type="file" class="form-control mt-2" id="img-file" multiple="" name="files" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                  </div>
                </form>
              </div>
            </div>
          </div><!-- End Upload Images Modal -->

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