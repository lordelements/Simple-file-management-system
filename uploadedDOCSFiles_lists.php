<?
session_start();

?>

<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Lists of uploaded documents</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Uploaded documents files</li>
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
                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#uploadDOCS-Modal">
                                            <i class="bi bi-upload"></i>Upload docs</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Home <span>| Today</span></h5>
                                <table class="table">
                                    <tbody>
                                        <?php
                                        include './connnection/config.php';

                                        $count_docs = 0;
                                        $query = "SELECT * FROM table_documents ORDER BY docsfile_id DESC";
                                        $result = mysqli_query($conn, $query);
                                        if ($result->num_rows > 0) {
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                $file_path = "uploaded_Docs_files/" . $row['docs_file'];
                                                if ($i % 3 == 0) {
                                                    echo '<tr>';
                                                }
                                        ?>

                                                <td scope="row">
                                                    <div class="card-body border">
                                                        <a class="icon mt-4" href="#" data-bs-toggle="dropdown">
                                                            <strong><i class="bi bi-three-dots"></i></strong>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                            <li class="dropdown-header text-start">
                                                                <h6>Options</h6>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="functions/Del_uploadedDOCS.php? deldocsfile= <?php echo  $row['docsfile_id'] ?>">
                                                                    <i class="bi bi-trash-fill"></i>Delete
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="<?php echo $file_path ?>" download target="_blank">
                                                                    <i class="bi bi-download"></i>Download
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <div class="gallery mb-4 mt-4">
                                                            <img src="assets/img/word-icon-png-4019.png" alt="documents" class="img-docs">
                                                        </div>
                                                        <span class="mt-4">
                                                            <h6 class="sub-title"><?php echo $row['docs_file'] ?></h6>
                                                            <small><?php echo  $row['created_date'] ?></small>
                                                            <p class="text-bold mt-4"><strong><?php echo $count_docs++ ?></strong></p>
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
                                            <tr>
                                                <div class="mb-3 fw-bold text-center text-danger form-control-md">&nbsp;&nbsp;&nbsp;No files uploaded yet</div>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                    <div class="table_count mb-3 fw-bold">
                                        <div><?php echo $count_docs ?>&nbsp;&nbsp;&nbsp; Records</div>
                                    </div>
                                </table>
                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                    <!-- Upload DOCS Modal -->
                    <div class="modal fade" id="uploadDOCS-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="functions/upload_DocsFunct.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="title_file" class="mt-4">Title of document</label>
                                            <input type="text" class="form-control mt-2" name="docs_title" id="title_document" placeholder="Name of document" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="validationTooltip01" class="mt-4">File to upload</label>
                                            <input type="file" class="form-control mt-2" name="docs_file" accept=".docx" id="document_file" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-primary" name="submit">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End Upload DOCS Modal -->
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
    .gallery {
        display: flex;
        place-items: center;
        justify-content: center;
        width: 300px; 
        padding: 20px;
    }
    .gallery .img-docs {
        width: 300px;
        height: 100px;
    }
</style>


<?php include_once('includes/scripts.php'); ?>
<?php include_once('includes/footer.php'); ?>