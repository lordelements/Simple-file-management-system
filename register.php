<?php include "includes/header_log-reg.php"; ?>
<main>
  <div class="container" style="width: 100%;">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <!-- <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
              </a>
            </div> -->
            <!-- End Logo -->

            <div class="card mb-3" style="width: 50rem;">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  <p class="text-center small">Enter your personal details to create account</p>
                </div>

                <?php include 'registerFunct.php'; ?>

                <form class="row g-3 needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>

                  <div class="col-4">
                    <label for="Firstname" class="form-label">First Name</label>
                    <input type="text" name="firstname" class="form-control" id="Firstname" placeholder="Enter a firstname." required>
                    <div class="invalid-feedback">Please choose a firstname.</div>
                  </div>

                  <div class="col-4">
                    <label for="Middlename" class="form-label">Middle Name</label>
                    <input type="text" name="middlename" class="form-control" id="Middlename" placeholder="Enter a middlename." required>
                    <div class="invalid-feedback">Please choose a middlename.</div>
                  </div>

                  <div class="col-4">
                    <label for="Lastname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" class="form-control" id="Lastname" placeholder="Enter a lastname." required>
                    <div class="invalid-feedback">Please choose a lastname.</div>
                  </div>

                  <div class="col-6">
                    <label for="yourUsername" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="yourUsername" placeholder="Enter a username." required>
                    <div class="invalid-feedback">Please choose a username.</div>
                  </div>

                  <div class="col-6">
                    <label for="yourEmail" class="form-label">Your Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" name="email" class="form-control" id="yourEmail" placeholder="Enter a valid Email adddres!" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourProfile" class="form-label">Identification</label>
                    <input type="file" name="profile_img" class="form-control" id="yourProfile" placeholder="Enter your profile identification" required>
                    <div class="invalid-feedback">Please enter your profile id!</div>
                  </div>

                  <div class="col-12">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="pass" placeholder="Enter your password" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <label for="cpass" class="form-label">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" id="cpass" placeholder="Confirm your password" required>
                    <div class="invalid-feedback">Please confirm your password!</div>
                  </div>

                  <div class="col-12">
                    <input type="hidden" name="usertype" class="form-control" id="usertype" value="user"><span class="fa fa-eye"></span>
                  </div>

                  <div class="col-12 mt-2">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input text-black" onclick="myFunction()"> Show password </label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                      <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                      <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="submit" type="submit">Create Account</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                  </div>
                </form>

              </div>
            </div>

            <script src="assets/js/show-register-pass.js"></script>
            <?php include "includes/footer-log-reg.php"; ?>