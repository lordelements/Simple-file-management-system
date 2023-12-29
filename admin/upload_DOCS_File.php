<?
session_start();
?>

<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Upload Document</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Upload Document</li>
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

                                    <li><a class="dropdown-item" href="uploadDocument.php">Upload</a></li>
                                </ul>
                            </div> -->

                            <div class="card-body pb-0">
                                <h5 class="card-title">Upload documents <span>| Today</span></h5>
                                <div class="row">

                                    <?php include 'functions/upload_DocsFunct.php'; ?>

                                    <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                                        <div class="row">
                                            <!-- <div class="row justify-content-center">
                                                <a href="" id="docs_file">documents</a>
                                            </div> -->

                                            <div class="col-md-12 mb-3">
                                                <label for="title_file" class="mt-4">Title of document</label>
                                                <input type="text" class="form-control mt-2" name="docs_title" id="title_document" 
                                                placeholder="Name of document" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationTooltip01" class="mt-4">File to upload</label>
                                                <input type="file" class="form-control mt-2" 
                                                name="docs_file" accept=".docx" id="document_file" required>
                                            </div>
                                            <div class="col-md-2 mb-4">
                                                <button type="submit" class="btn btn-outline-primary" name="submit">Upload</button>
                                                <a href="uploadedDOCSFiles_lists.php" class="btn btn-outline-danger">Back</a>
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

<script>
    // profile 
    const document = document.getElementById("docs_file"),
    document_file = document.getElementById("document_file");

    document_file.addEventListener("change", (e) => {
        e.preventDefault();
        docs_file.src = URL.createObjectURL(document_file.Document[0]);
    });
</script>


<?php include_once('includes/scripts.php'); ?>
<?php include_once('includes/footer.php'); ?>