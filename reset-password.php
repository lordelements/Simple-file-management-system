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
                                    <h5 class="card-title text-center pb-0 fs-4">Reset your password</h5>
                                    <p class="text-center small">Send email to reset your password</p>
                                </div>
                                <?php include 'functions/send-resetpassFunct.php'; ?>
                                <form action="" method="post" class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="youremail" class="form-label">Your email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input name="email" type="email" class="form-control" id="youremail" placeholder="email"
                                             required>
                                            <div class="invalid-feedback">Please enter your email.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-outline-primary w-100" name="submit">Send</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Back to <a href="login.php">Log in</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <script src="assets/js/show-register-pass.js"></script>

                        <?php include "includes/footer-log-reg.php"; ?>