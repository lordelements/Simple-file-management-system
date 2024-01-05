<?php
  // session_start();
  if(isset($_SESSION['user_id']) && isset($_SESSION['username'])) {

  }
?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="./index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse"
         href="#">
          <i class="bi bi-person"></i><span>Uploaded Files</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./uploadedImagesFiles_lists.php">
              <i class="bi bi-circle"></i><span>Uploaded images</span>
            </a>
          </li>  
          <li>
            <a href="uploadedPDFfiles.php">
              <i class="bi bi-circle"></i><span>Uploaded pdf</span>
            </a>
          </li>  
          <li>
            <a href="./uploadedDOCSFiles_lists.php">
              <i class="bi bi-circle"></i><span>Uploaded documents</span>
            </a>
          </li>  
          <li>
            <a href="./uploadedVideoFiles_lists.php">
              <i class="bi bi-circle"></i><span>Uploaded videos</span>
            </a>
          </li>  
        </ul>
      </li><!-- End uploaded Page Nav -->



      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="./users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->