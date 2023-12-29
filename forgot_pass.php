<?php include "includes/header_log-reg.php"; ?>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Forgot password</h5>
                                    <p class="text-center small">Enter your new password to login</p>
                                </div>
                                <form action="" method="post" class="row g-3 needs-validation" novalidate>
                                    
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Current Password</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock-fill"></i></span>
                                            <input name="password" type="password" class="form-control" id="pass" placeholder="password" required value="<?php echo $pass  ?>">
                                            <div class="invalid-feedback">Please enter your password.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="pass" class="form-label">New Password</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock-fill"></i></span>
                                            <input type="password" name="password" class="form-control" id="npass" placeholder="password" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="Confirmpass" class="form-label">Re-enter New Password</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock-fill"></i></span>
                                            <input name="cpassword" type="password" class="form-control" id="cpass" placeholder="re-enter new password">
                                            <div class="invalid-feedback">Please re-enter your new password!</div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <button class="btn btn-primary w-100" type="submit">Change Password</button>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input text-black" onclick="myFunction()"> Show password </label>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Back to <a href="login.php">Log in</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <script src="assets/js/show-register-pass.js"></script>

                        <?php include "includes/footer-log-reg.php"; ?>