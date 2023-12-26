<?
session_start();
?>


<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Lists of uploaded videos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">uploaded videos</li>
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
                                    <li><a class="dropdown-item" href="upload_Video_File.php">Upload video</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <!-- upload response -->
                                <?php
                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                                ?>
                                <h5 class="card-title">Top Selling <span>| Today</span></h5>

                                <div class="container">

                                    <?php
                                    include '../connnection/config.php';

                                    $count_videos = 0;

                                    $query = "SELECT * FROM table_videos ORDER BY file_id DESC";
                                    $result = mysqli_query($conn, $query);
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            $file_path = "../uploaded_Videofiles/" . $row['video_file'];

                                    ?>

                                            <div class="row">

                                                <div class="card-body">

                                                    <a class="icon" href="#" data-bs-toggle="dropdown">
                                                        <strong><i class="bi bi-three-dots"></i></strong>
                                                    </a>

                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                        <li class="dropdown-header text-start">
                                                            <h6>Options</h6>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this entry?')" href="Del_UploadedVideo.php? delvideo_id= <?php echo  $row['file_id'] ?>">
                                                                <span class="fa fa-trash">Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <video width="100%" height="320" src="<?php echo  $file_path ?>" controls></video><br>
                                                    <span><?php echo  $row['video_file'] ?></span>
                                                    <span>
                                                        <h5 class="sub-title"><?php echo  $row['video_title'] ?></h5><?php echo $count_videos++ ?>
                                                    </span>
                                                    <!-- <div class="col-sm">
                                                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')" href="Del_UploadedVideo.php? delvideo_id= <?php echo  $row['file_id'] ?>">
                                                            <i class="fa fa-trash">Delete</i>
                                                        </a>
                                                    </div> -->
                                                </div>
                                            </div>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div>
                                            <h5 class="mb-3 fw-bold">&nbsp;&nbsp;&nbsp;No files yet</h5>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <h6>
                                        <strong>
                                            <?php echo  $count_videos ?>&nbsp;&nbsp;&nbsp; number of videos
                                        </strong>
                                    </h6>
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



<?php include_once('includes/scripts.php'); ?>
<?php include_once('includes/footer.php'); ?>