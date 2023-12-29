
<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update profile picture</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Update profile picture</li>
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
                                <h5 class="card-title">Update profile picture <span>| Today</span></h5>
                                <div class="row">

                                    <?php
                                    include '../connnection/config.php';
                                    $user_id = $_GET['update_pic'];
                                    $sql = "SELECT `profile_img` FROM table_register_acc WHERE user_id = $user_id";
                                    $result = $conn->query($sql);

                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $file_path = "../uploaded_Profiles/" . $row['profile_img'];

                                    ?>

                                        <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                                            
                                           <?php include "functions/editprofileFunct.php"; ?>

                                            <div class="row mb-3">
                                                <div class="d-flex justify-content-center rounded-circle" width="400" height="400">
                                                    <img class="rounded-circle" src="<?php echo $file_path ?>" alt="profile_picture" id="img">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="img-file" class="col-form-label">File to upload</label>
                                                <div class="col-md-12">
                                                    <div class="pt-2">
                                                        <input type="file" class="form-control mt-2" id="img-file" name="profile_img">
                                                        <div class="invalid-feedback">Fill up file input!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                                    <button type="submit" class="btn btn-outline-primary" name="update">Save Changes</button>
                                                    <a href="users-profile.php" class="btn btn-outline-danger">Cancel</a>
                                                </div>
                                            </div>
                                            
                                        </form>

                                    <?php
                                    } else {
                                        echo 'Record not found';
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

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