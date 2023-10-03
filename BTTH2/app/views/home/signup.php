<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/layout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                </div>
                <div class="modal-body">
                    SIGN UP FAILURE
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include(APP_ROOT . '/app/views/layout/header1.php');
    ?>

    <div class="container-fluid p-0">
        <div class="row w-100" style="position: absolute; top:120px;">
            <div class="row w-100" id="login_content">
                <div class="col vh-100" style="position: relative;">
                    <div id="form-icon">
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-google"></i>
                        <i class="bi bi-twitter"></i>
                    </div>
                    <div id="form_register" style="position: absolute;">
                        <form action="<?= DOMAIN . 'public/index.php?controller=login&action=check_signup' ?>"
                            method="post">
                            <p style="font-size: 40px;">Sign In</p>
                            <hr>
                            <div id="liveAlertPlaceholder"></div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" placeholder="username" name="username"
                                    id="username">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                <input type="password" class="form-control" placeholder="password" name="password"
                                    id="password">
                            </div>

                            <div class=" form-check p-0" style="font-size:10px;">
                                <p>The password must be at least 8 characters long and contain at least 1 uppercase
                                    letter, 1 special character, and 1 digit.</p>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                <input type="password" class="form-control" placeholder="retype password"
                                    name="retype_password" id="retype_password">
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <p>I agree to the policies and terms.</p>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-warning my-3"
                                    onclick="validateForm(event)">Register</button>
                            </div>

                            <div class="text-center c-warning">
                                <hr>
                                <p>Do have an account? <a
                                        href="<?= DOMAIN . 'public/index.php?controller=login&action=login' ?>">Sign
                                        In</a></p>
                            </div>
                        </form>
                    </div>
                    <div class="col vw-100" style="position: absolute; bottom:0;">
                        <hr>
                        <h4 style="text-align:center">TLU'S MUSIC GARDEN</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="../public/js/snippets.js"></script>
    <script>
        var element = document.getElementById('dangnhap');
        element.className = 'nav-link active';
        function validateForm(event) {
            var checkbox = document.getElementById("exampleCheck1");
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var retypePassword = document.getElementById("retype_password").value;
            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?=.*[a-zA-Z\d!@#$%^&*()\-_=+{};:,<.>]).{8,}$/;

            var isUsernameValid = username.trim() !== '';
            var isCheckboxChecked = checkbox.checked;
            var isPasswordValid = passwordPattern.test(password);
            var doPasswordsMatch = password === retypePassword;

            var isFormValid = true;

            if (!isUsernameValid) {
                event.preventDefault();
                appendAlert('Username is required', 'warning');
                isFormValid = false;
            }

            if (!isCheckboxChecked) {
                event.preventDefault();
                appendAlert('Please agree to the policies and terms', 'warning');
                isFormValid = false;
            }

            if (!isPasswordValid) {
                event.preventDefault();
                appendAlert('Invalid password format', 'warning');
                isFormValid = false;
            }

            if (!doPasswordsMatch) {
                event.preventDefault();
                appendAlert('Passwords do not match', 'warning');
                isFormValid = false;
            }

            if (isFormValid) {
                event.stopPropagation(); // Tiếp tục sự kiện
                var form = document.getElementById('form_register');
                form.submit();
            }
        }
    </script>
    <script src="../public/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var checkAddParam = '';
            <?php
            if (isset($check_signup)) {
                ?>
                var checkAddParam = '<?= $check_signup ?>';
                <?php
            }
            ?>
            if (checkAddParam == 'false') {
                var modal = new bootstrap.Modal(document.getElementById('exampleModal1'));
                modal.show();
            }
        });

    </script>
</body>

</html>