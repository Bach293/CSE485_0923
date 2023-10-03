<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/layout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                </div>
                <div class="modal-body">
                    REGISTRATION SUCCESS
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                </div>
                <div class="modal-body">
                    LOGIN FAILURE
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
                    <div id="form_login" style="position: absolute;">
                        <form action="<?= DOMAIN . 'public/index.php?controller=login&action=check_account' ?>"
                            method="post">
                            <p style="font-size: 40px;">Sign In</p>
                            <hr>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" placeholder="username" name="username">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                <input type="password" class="form-control" placeholder="password" name="password">
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <p>Remember Me</p>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning mb-5">Sign in</button>
                            </div>

                            <div class="text-center c-warning">
                                <hr>
                                <p>Don't have an account? <a href="<?= DOMAIN . 'public/index.php?controller=login&action=signup' ?>">Sign Up</a></p>
                                <p><a href="#">Forgot your password?</a></p>
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

    <script>
        var element = document.getElementById('dangnhap');
        element.className = 'nav-link active';
    </script>
    <script src="../public/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var checkAddParam = '';
            <?php
            if (isset($check_account)) {
                ?>
                var checkAddParam = '<?= $check_account ?>';
                <?php
            }
            ?>
            if (checkAddParam == 'false') {
                var modal = new bootstrap.Modal(document.getElementById('exampleModal1'));
                modal.show();
            }
        });
        document.addEventListener("DOMContentLoaded", function () {
            var checkAddParam = '';
            <?php
            if (isset($check_signup)) {
                ?>
                var checkAddParam = '<?= $check_signup ?>';
                <?php
            }
            ?>
            if (checkAddParam == 'true') {
                var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                modal.show();
            }
        });

    </script>
</body>

</html>