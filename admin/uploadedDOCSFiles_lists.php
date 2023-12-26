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
                                    <li><a class="dropdown-item" href="./upload_Images_File.php">Upload image</a></li>
                                    <li><a class="dropdown-item" href="./upload_docs_file.php">Upload pdf</a></li>
                                    <li><a class="dropdown-item" href="./upload_DOCS_File.php">Upload docs</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Home <span>| Today</span></h5>

                                <table class="table table-border table-hover">

                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Document file name</th>
                                            <th scope="col">Document file title</th>
                                            <th scope="col">Date uploaded</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include '../connnection/config.php';

                                        $count_docs = 0;
                                        $query = "SELECT * FROM table_documents ORDER BY docsfile_id DESC";
                                        $result = mysqli_query($conn, $query);
                                        if ($result->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                $file_path = "../uploaded_Docs_files/" . $row['docs_file'];

                                        ?>

                                                <tr>
                                                    <td scope="row"><?php echo $count_docs++ ?></td>
                                                    <td>
                                                        <?php
                                                        echo '<a href="#">' . $row['docs_file'] . '</a>';
                                                        ?>
                                                    </td>
                                                    <td scope="row" class="fw-bold"><?php echo  $row['docs_title'] ?></td>
                                                    <td scope="row" class="fw-bold"><?php echo  $row['created_date'] ?></td>

                                                    <td scope="row" class="fw-bold">
                                                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')" href="Del_uploadedDOCS.php? deldocsfile= <?php echo  $row['docsfile_id'] ?>">
                                                            <i class="fa fa-trash">Delete</i>
                                                        </a>

                                                        <a class="btn btn-primary" href="<?php echo  $file_path ?>" download target="_blank">
                                                            <i class="fa fa-download">Download DOCS</i>
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
                                        <div><?php echo $count_docs ?>&nbsp;&nbsp;&nbsp; Records</div>
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