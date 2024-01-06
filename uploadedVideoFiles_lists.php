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
                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#uploadivideo-Modal">
                                            <i class="bi bi-upload"></i>Upload video</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Top Selling <span>| Today</span></h5>
                                <div class="container">

                                    <table class="table table-borderless table-responsive">
                                        <tbody>

                                            <?php
                                            include './connnection/config.php';
                                            $count_videos = 0;
                                            $query = "SELECT * FROM table_videos ORDER BY file_id DESC";
                                            $result = mysqli_query($conn, $query);


                                            if ($result) {
                                                $i = 0;
                                                while ($row = mysqli_fetch_assoc($result)) {

                                                    $file_path = "./uploaded_Videofiles/" . $row['video_file'];
                                                    if ($i % 3 == 0) {
                                                        echo '<tr>';
                                                    }

                                            ?>
                                           
                                                    <td class="">
                                                        <div class="card-body border">
                                                            <a class="icon mt-4" href="#" data-bs-toggle="dropdown">
                                                                <strong><i class="bi bi-three-dots"></i></strong>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                                <li class="dropdown-header text-start">
                                                                    <h6>Options</h6>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this entry?')" href="functions/Del_UploadedVideo.php? delvideo_id= <?php echo  $row['file_id'] ?>">
                                                                        <i class="bi bi-trash-fill"></i>Delete
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <video src="<?php echo $file_path ?>" controls class="mt-2" width="100%" height="200px"></video>
                                                            <span>
                                                                <h5 class="sub-title"><?php echo  $row['video_file'] ?></h5><?php echo $count_videos++ ?>
                                                            </span>
                                                        </div>
                                                    </td>

                                                <?php
                                                    if ($i % 3 == 2) {
                                                        echo '</tr>';
                                                    }
                                                    $i++;
                                                }
                                            } else {
                                                ?>
                                                <div>
                                                    <h5 class="mb-3 fw-bold text-center text-danger form-control-md">&nbsp;&nbsp;&nbsp;Empty lists</h5>
                                                </div>

                                            <?php
                                            }

                                            ?>

                                        </tbody>
                                        
                                    <h6 class="mb-3">
                                        <strong>
                                            <?php echo  $count_videos ?>&nbsp;&nbsp;&nbsp; Total uploaded videos
                                        </strong>
                                    </h6>
                                    </table>

                                </div>

                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                    <!-- Upload Images Modal -->
                    <div class="modal fade" id="uploadivideo-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload video</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="functions/upload_VideoFunct.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="validationTooltip01" class="mt-4">Video title</label>
                                            <input type="text" class="form-control mt-2" id="validationTooltip01" name="video_title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationTooltip01" class="mt-4">Upload video</label>
                                            <input type="file" class="form-control mt-2" id="validationTooltip01" multiple="" name="video_file" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-primary" name="submit">Upload</button>
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

<style>

</style>


<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>

<?php include_once('includes/scripts.php'); ?>
<?php include_once('includes/footer.php'); ?>