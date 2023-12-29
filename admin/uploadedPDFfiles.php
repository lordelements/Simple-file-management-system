<?
session_start();

?>


<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Lists of uploaded pdf files</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Uploaded pdf files</li>
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
                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#uploadPDF-Modal">Upload PDF</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Home <span>| Today</span></h5>

                                <table class="table table-border table-hover">

                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">PDF File</th>
                                            <th scope="col">PDF File Name</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include '../connnection/config.php';

                                        $count_pdf = 0;
                                        $query = "SELECT * FROM table_pdffile ORDER BY file_id DESC";
                                        $result = mysqli_query($conn, $query);
                                        if ($result->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                $file_path = "../uploaded_PDFfiles/" . $row['pdf_file'];

                                        ?>

                                                <tr>
                                                    <td scope="row"><?php echo $count_pdf++ ?></td>
                                                    <td scope="row">
                                                        <?php
                                                        echo '<a href="#">' . $row['pdf_file'] . '</a>';
                                                        ?>
                                                    </td>
                                                    <td scope="row" class="fw-bold"><?php echo  $row['pdf_fileName'] ?></td>

                                                    <td scope="row" class="fw-bold">
                                                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')" 
                                                        href="Del_uploadedPDF.php? delfile_id= <?php echo  $row['file_id'] ?>">
                                                            <i class="fa fa-trash">Delete</i>
                                                        </a>

                                                        <!-- <a class="btn btn-primary" href="OpenPDF.php? openPDFfile_id= <?php echo  $row['file_id'] ?>">
                                                        <i class="fa fa-eye">View</i>
                                                    </a> -->
                                                        <a class="btn btn-primary" href="<?php echo  $file_path ?>" download target="_blank">
                                                            <i class="fa fa-download">Download PDF</i>
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
                                    <div class="table_count mb-3 fw-bold">
                                        <div><?php echo $count_pdf ?>&nbsp;&nbsp;&nbsp; Records</div>
                                    </div>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                    <!-- Upload Images Modal -->
                    <div class="modal fade" id="uploadPDF-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <?php include 'functions/upload_PDFFunct.php'; ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="mb-3 d-flex justify-content-center">
                                            <img class=" justify-content-center rounded" src="./assets/img/pic_avatar.png" alt="" id="img" width="200" height="200">
                                        </div>
                                        <div class="mb-3">
                                            <label for="title_file" class="mt-4">Title of file</label>
                                            <input type="text" class="form-control mt-2" id="title_file" placeholder="Name of pdf file" name="pdf_fileName" accept=".pdf" title="Upload PDF" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationTooltip01" class="mt-4">Upload pdf</label>
                                            <input type="file" class="form-control mt-2" id="validationTooltip01" value="" name="pdf_file" required>
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




<?php include_once('includes/scripts.php'); ?>
<?php include_once('includes/footer.php'); ?>