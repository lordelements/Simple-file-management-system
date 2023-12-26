<?
session_start();

?>

<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Upload Files</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Upload Files</li>
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

                                    <li><a class="dropdown-item" href="uploadedPDFFiles.php">Upload pdf</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Upload pdf file <span>| Today</span></h5>
                                <div class="row">
                                    <?php include 'functions/upload_PDFFunct.php';?>
                                    <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="title_file" class="mt-4">Name of pdf file</label>
                                                <input type="text" 
                                                    class="form-control mt-2" 
                                                    id="title_file"
                                                    placeholder="Name of pdf file" 
                                                    name="pdf_fileName" 
                                                    accept=".pdf" 
                                                    title="Upload PDF" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationTooltip01" class="mt-4">Upload pdf</label>
                                                <input type="file" class="form-control mt-2" id="validationTooltip01" value="" name="pdf_file" required>
                                            </div>
                                            <div class="col-md-2 mb-4">
                                                <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                                            </div>
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




<?php include_once('includes/scripts.php'); ?>
<?php include_once('includes/footer.php'); ?>