

<?php

$username = $_SESSION["username"];
$result = mysqli_query($conn, "SELECT * FROM `table_register_acc` WHERE username='$username'");

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $user_id = $row["user_id"];
    $pass  = $row['password'];
  }
}

?>


<div class="tab-pane fade pt-3" id="profile-change-password">

  <!-- Change Password Form -->
  <form method="post" action="change_passFunct.php">
    <div class="row mb-3">
      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
      <div class="col-md-8 col-lg-9">
        <input name="password" type="password" class="form-control" id="pass" value="<?php echo $pass  ?>">
      </div>
    </div>
    <div class="row mb-3">
      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password <span class="text-danger">*</span></label>
      <div class="col-md-8 col-lg-9">
        <input name="password" type="password" class="form-control" id="npass">
      </div>
    </div>
    <div class="row mb-3">
      <label for="cPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password <span class="text-danger">*</span></label>
      <div class="col-md-8 col-lg-9">
        <input name="cpassword" type="password" class="form-control" id="cpass">
      </div>
    </div>
    <div class="text-center col-md-8 m-3">
      <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
      <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
      <div class="form-check mt-4">
        <label class="form-check-label text-muted">
          <input type="checkbox" class="form-check-input text-black" onclick="myFunction()"> Show password </label>
      </div>
    </div>
  </form><!-- End Change Password Form -->

</div>
