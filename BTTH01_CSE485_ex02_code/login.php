<?php
if (isset($_GET['check_account']) && $_GET['check_account'] === 'true') {
    header("Location: admin/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH01_CSE485_ex02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid vh-100" style="position: relative; padding:0;">
        <?php
        include('header.php');
        ?>
        <div class="row w-100" style="position: absolute; top:120px;">
            <div class="row w-100" id="login_content">
                <div class="col vh-100" style="position: relative;">
                    <div id="form-icon">
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-google"></i>
                        <i class="bi bi-twitter"></i>
                    </div>
                    <div id="form_login" style="position: absolute;">
                        <form action="check_account.php" method="post">
                            <p style="font-size: 40px;">Sign In</p>
                            <hr>
                            <div id="liveAlertPlaceholder"></div>
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
                                <p>Don't have an account? <a href="#">Sign Up</a></p>
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

    <script src="js/snippets.js"></script>

    <?php
    
    if (isset($_GET['check_account']) && $_GET['check_account'] === 'false') {
        echo "<script>appendAlert('Thông tin đăng nhập chưa chính xác', 'warning');</script>";
    } else {
        echo "Chưa đăng nhập hoặc lỗi code";
    }
    ?>

    <script>
        var element = document.getElementById('dangnhap');
        element.className = 'nav-link active';
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
